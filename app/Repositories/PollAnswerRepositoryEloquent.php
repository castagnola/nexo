<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Entities\PollAnswer;
use Nexo\Entities\Service;
use Vinkla\Hashids\Facades\Hashids;

/**
 * Class PollAnswerRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class PollAnswerRepositoryEloquent extends BaseRepository implements PollAnswerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PollAnswer::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }

    /***
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        \DB::beginTransaction();

        $pollAttributes = $attributes;
        unset($pollAttributes['questions']);

        if(array_key_exists('service', $attributes)){
            $serviceId = Hashids::decode($attributes['service'])[0];  
            $pollAttributes['service_id']  =  $serviceId;
            $serviceRepository = app(ServiceRepository::class);

            $service = array();
            $service['id'] = $serviceId;
            $service['service_status_id'] = 7;
            $service['only'] = 'true';
            $serviceModel = $serviceRepository->update($service, $service['id']);
        }
        
        $model = parent::create($pollAttributes);

        //impr($pollAttributes);
        //exit;

        unset($attributes['questions']['data']);

        if (isset($attributes['questions'])) {
            foreach ($attributes['questions'] as $question) {


                $poll_option_id = (array_key_exists('poll_option_id', $question))?$question['poll_option_id']:'';
                $answer = (array_key_exists('answer', $question))?$question['answer']:'';
                $id = (array_key_exists('id', $question))?$question['id']:'';

                $answers = array(
                                'poll_answer_id' => $model->id,
                                );

                if($id){
                    $answers['poll_question_id'] = $id;
                }

                if($poll_option_id){
                    $answers['poll_option_id'] = $poll_option_id;
                }


                if($answer){
                    $answers['answer'] = $answer;
                }


                if($id){
                    $questionModel = app(PollAnswerOptionRepository::class)->create($answers);    
                }
                
            }
        }

        

        \DB::commit();

        return $model;
    }


    public function update(array $attributes, $id)
    {
        \DB::beginTransaction();


        // destroy the questions created_at and updated_at
        if(isset($attributes['questions']) && !empty($attributes['questions']))
        {
            foreach ($attributes['questions'] as &$question) {
                if(isset($question['created_at'])) {
                    unset($question['created_at']);
                }
                if(isset($question['updated_at'])) {
                    unset($question['updated_at']);
                }
                if(isset($question['options']) && !empty($question['options'])) {
                    foreach($question['options'] as &$option) {
                        if(isset($option['created_at'])) {
                            unset($option['created_at']);
                        }
                        if(isset($option['updated_at'])) {
                            unset($option['updated_at']);
                        }
                    }
                }
            }
        }

        if(array_key_exists('service', $attributes)){
            $serviceId = Hashids::decode($attributes['service'])[0];  
            $attributes['service_id']  =  $serviceId;
        }


        $model = parent::update($attributes, $id);

        if (isset($attributes['questions'])) {

            $questionsRepository = app(PollAnswerOptionRepository::class);
            $questionsSaved = [];

            foreach ($attributes['questions'] as $question) {

                if (isset($question['id'])) {
                    $questionModel = $questionsRepository->update($question, $question['id']);
                } else {
                    $questionModel = $questionsRepository->create([
                        'poll_answer_id' => $model->id,
                    'poll_option_id' => $question['poll_option_id'],
                    'poll_question_id' => $question['id'],
                    'answer' => $question['answer'],
                    ]);
                }

                $questionsSaved[] = $questionModel->id;

            }

            $questionsToDelete =  $questionsRepository->model->whereNotIn('id', $questionsSaved)->where('poll_id', $model->id)->get();

            // Eliminando las preguntas que no existen
            $questionsToDelete->each(function($questionToDelete){
                $questionToDelete->options()->delete();
                $questionToDelete->delete();
            });
        }

        \DB::commit();

        return $model;
    }
}