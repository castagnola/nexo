@include('emails.partials.header')


        <!-- ONE COLUMN SECTION -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 15px 15px 15px 15px;" class="section-padding">
            <table border="0" cellpadding="0" cellspacing="0" width="500" class="responsive-table">
                <tr>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <!-- COPY -->
                                <td align="center" style="font-size: 32px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;" class="padding-copy">Hola, {{ $first_name }}</td>
                            </tr>
                            <tr>
                                <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">
                                    Gracias por usar Nexo, activa tu cuenta para continuar disfrutando de esta maravillosa experiencia de logística.
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <!-- BULLETPROOF BUTTON -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
                                        <tr>
                                            <td align="center" style="padding: 25px 0 0 0;" class="padding-copy">
                                                <table border="0" cellspacing="0" cellpadding="0" class="responsive-table">
                                                    <tr>
                                                        <td align="center">
                                                            <a href="{{ $url }}" target="_blank"
                                                               style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #ffffff; text-decoration: none; background-color: red; border-top: 15px solid red; border-bottom: 15px solid red; border-left: 25px solid red; border-right: 25px solid red; display: inline-block;"
                                                               class="mobile-button">
                                                                Activar cuenta
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="20"></td>
                            </tr>
                            <tr>

                                <td align="center">
                                    <a href='https://play.google.com/store/apps/details?id=com.nexologistica&hl=es&utm_source=global_co&utm_medium=prtnr&utm_content=Mar2515&utm_campaign=PartBadge&pcampaignid=MKT-Other-global-all-co-prtnr-ap-PartBadge-Mar2515-1'>
                                        <img alt='Disponible en Google Play' src='https://play.google.com/intl/en_us/badges/images/apps/es-419-play-badge.png'/>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

@include('emails.partials.footer')
