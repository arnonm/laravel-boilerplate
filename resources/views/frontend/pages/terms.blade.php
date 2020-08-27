@extends('frontend.layouts.app')

@section('title', __('global.Terms & Conditions'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('global.Terms & Conditions')
                    </x-slot>

                    <x-slot name="body">
                        <p dir="ltr" class="text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Molestie ac feugiat sed lectus.
                            Egestas diam in arcu cursus. Vitae nunc sed velit dignissim sodales ut eu sem. Nibh praesent
                            tristique magna sit amet purus gravida quis. Tincidunt lobortis feugiat vivamus at augue. Mi
                            quis hendrerit dolor magna eget est lorem. Dapibus ultrices in iaculis nunc sed augue lacus
                            viverra vitae. Ullamcorper malesuada proin libero nunc consequat interdum varius. Tellus
                            elementum sagittis vitae et leo duis ut diam quam. Nisl pretium fusce id velit. Sed enim ut
                            sem viverra aliquet.</p>

                        <p dir="ltr" class="text-left">Laoreet suspendisse interdum consectetur libero id. Duis ut diam
                            quam nulla porttitor massa id neque. Nullam eget felis eget nunc lobortis mattis aliquam
                            faucibus. Tristique sollicitudin nibh sit amet commodo. A erat nam at lectus urna duis
                            convallis convallis. Commodo sed egestas egestas fringilla phasellus faucibus scelerisque
                            eleifend donec. Bibendum ut tristique et egestas. Risus sed vulputate odio ut enim blandit
                            volutpat maecenas. Lorem dolor sed viverra ipsum nunc aliquet bibendum enim. Tristique
                            sollicitudin nibh sit amet commodo. Ac felis donec et odio pellentesque diam volutpat
                            commodo sed. Quam quisque id diam vel. Massa tempor nec feugiat nisl pretium fusce id.
                            Consectetur purus ut faucibus pulvinar elementum integer enim neque volutpat.</p>

                        <p dir="ltr" class="text-left">Gravida rutrum quisque non tellus orci. Eget mauris pharetra et
                            ultrices neque. Habitasse platea dictumst quisque sagittis purus sit amet volutpat. Nunc
                            consequat interdum varius sit amet mattis vulputate enim. Venenatis a condimentum vitae
                            sapien pellentesque habitant morbi tristique senectus. Tempor nec feugiat nisl pretium.
                            Fames ac turpis egestas integer eget aliquet nibh. Mus mauris vitae ultricies leo integer.
                            Vitae proin sagittis nisl rhoncus mattis rhoncus. Commodo odio aenean sed adipiscing diam
                            donec. Purus semper eget duis at tellus at urna condimentum mattis.</p>

                        <p dir="rtl" class="text-right">לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית הועניב
                            היושבב שערש שמחויט - שלושע ותלברו חשלו שעותלשך וחאית נובש ערששף. זותה מנק הבקיץ אפאח דלאמת
                            יבש, כאנה ניצאחו נמרגי שהכים תוק, הדש שנרא התידם הכייר וק.
                        </p>

                        <p dir="rtl" class="text-right">
                            ליבם סולגק. בראיט ולחת צורק מונחף, בגורמי מגמש. תרבנך וסתעד לכנו סתשם השמה - לתכי מורגם
                            בורק? לתיג ישבעס.
                        </p>

                        <p dir="rtl" class="text-right">
                            לורם איפסום דולור סיט אמט, גולר מונפרר סוברט לורם שבצק יהול, לכנוץ בעריר גק ליץ, ושבעגט ליבם
                            סולגק. בראיט ולחת צורק מונחף, בגורמי מגמש. תרבנך וסתעד לכנו סתשם השמה - לתכי מורגם בורק?
                            לתיג ישבעס.
                        </p>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection
