<?php

namespace Nexo\Repositories;

use Request;
use File;
use DB;
use Carbon\Carbon;
use Nexo\Entities\Poll;
use Nexo\Entities\PollQuestion;
use Nexo\Entities\PollOption;
use Nexo\Validators\PollValidator;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class PollRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class PollRepositoryEloquent extends BaseRepository implements PollRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Poll::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function validator()
    {
        return PollValidator::class;
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
        $model = parent::create($pollAttributes);

        $this->active($model);

        if (isset($attributes['questions'])) {
            foreach ($attributes['questions'] as $question) {
                $questionModel = app(PollQuestionRepository::class)->create([
                    'poll_id' => $model->id,
                    'question' => $question['question'],
                    'type' => $question['type'],
                ]);

                if ($questionModel->type == 'multiple') {
                    foreach ($question['options'] as $option) {
                        app(PollOptionRepository::class)->create([
                            'poll_question_id' => $questionModel->id,
                            'option' => $option['option']
                        ]);
                    }
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
            foreach ($attributes['questions'] as &$tempQuestion) {
                if(isset($tempQuestion['created_at'])) {
                    unset($tempQuestion['created_at']);
                }
                if(isset($tempQuestion['updated_at'])) {
                    unset($tempQuestion['updated_at']);
                }
                if(isset($tempQuestion['options']) && !empty($tempQuestion['options'])) {
                    foreach($tempQuestion['options'] as &$tempOption) {
                        if(isset($tempOption['created_at'])) {
                            unset($tempOption['created_at']);
                        }
                        if(isset($tempOption['updated_at'])) {
                            unset($tempOption['updated_at']);
                        }
                    }
                }
            }
        }

        

        $model = parent::update($attributes, $id);

        $this->active($model);

        $questions = array();
        $questions = $attributes['questions'];

        if (isset($questions)) {

            //$questionsRepository = app(PollQuestionRepository::class);
            $questionsRepository = app(PollQuestionRepository::class);
            $questionsSaved = [];

            $update = array();
            $update['deleted_at'] = Carbon::now()->toDateTimeString();
            PollQuestion::where('poll_id', $model->id)->update($update); 


            foreach ($questions as $k => $question) {

                if(array_key_exists('id', $question)){
                    if(isset($question['id'])) {
                        $findQuestion = PollQuestion::withTrashed()->where('id', '=', $question['id'])->first();
                        $findQuestion->restore();
                        $questionModel = app(PollQuestionRepository::class)->update($question, $question['id']);
                    } 
                } else {
                    $questionModel = app(PollQuestionRepository::class)->create([
                        'poll_id' => $model->id,
                        'question' => $question['question'],
                        'type' => $question['type'],
                    ]);
                }


                $questionsSaved[] = $questionModel->id;
                $question['id'] = $questionModel->id;

                if(array_key_exists('options', $question)){
                    if ($questionModel->type == 'multiple' and isset ($question['options'])) {

                        $optionsSaved = [];
                        $optionsRepository = app(PollOptionRepository::class);


                        if (!empty($question['id'])) {
                            $update = array();
                            $update['deleted_at'] = Carbon::now()->toDateTimeString();
                            PollOption::where('poll_question_id', $question['id'])->update($update);
                        }

                        foreach ($question['options'] as $option) {
                            if(array_key_exists('id', $option)){
                                if (isset($option['id'])) {
                                    $findOption = PollOption::withTrashed()->where('id', '=', $option['id'])->first();
                                    $findOption->restore();
                                    $optionModel = $optionsRepository->update($option, $option['id']);
                                }
                            }else {
                                $optionModel = $optionsRepository->create([
                                    'poll_question_id' => $questionModel->id,
                                    'option' => $option['option']
                                ]);
                            }

                            $optionsSaved[] = $optionModel->id;
                        }
                    }    
                }
                
            }

            // Elimiando las opciones que no existen
                        //$optionsRepository->model->whereNotIn('id', $optionsSaved)->where('poll_question_id', $questionModel->id)->delete();


            //$questionsToDelete =  $questionsRepository->model->whereNotIn('id', $questionsSaved)->where('poll_id', $model->id)->get();

            // Eliminando las preguntas que no existen
            //$questionsToDelete->each(function($questionToDelete){
                //$questionToDelete->options()->delete();
                //$questionToDelete->delete();
            //});
        }

        \DB::commit();

        return $model;
    }

    public function active($model){
        if($model->is_active == 1){
            $team = $model->team_id;

            DB::table('polls')
            ->where('team_id', $team)
            ->where('id','!=',$model->id)
            ->update(['is_active' => 0]);
        }
        
    }
}