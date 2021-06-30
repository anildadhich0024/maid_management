@extends('layouts.app')

@section('content')
    <div class="common-banner" style="background-image: url('{{asset('images/banner-img-2.png')}}');">
         <h1>Training</h1>
    </div>
     <div class="section section-padding-bottom">
        <div class="container">
            <div class="row section-padding-top">
                <div class="col-md-12">

                   <p>Proper and adequate training is vital to the success of the FDWs in having the necessary knowledge and skills that they need to perform on their jobs. In an attempt to ensure and maintain a high-quality standard of FDWs, we have partnered with quite extensive training centres in the Philippines, Indonesia and Myanmar that are licensed and accredited with the appropriate government authorities. On-site visitations and observations are welcomed upon request. We have the appropriate facilities and capabilities to provide strict and relevant training to our FDWs to ensure that they are not only qualified but are also the best candidates.</p>

                <p>After interviews, the selected and qualified FDWs that come from the provinces are then transferred to the training centre for accelerated training. They are required to undergo 30 days of intensive orientation and preparation to receive certification by the qualified assessor or trainer.</p>


                </div>
                <div class="col-md-12">
                    <img src="{{asset('images/banner.jpg')}}" alt="">
                </div>

            </div>
            <div class="row section-padding-top">
                <div class="col-md-6">
                    <blockquote id="link1">
                        <h4>Language proficiency course (basic English)</h4>
                        <p>Classes are conducted with usage of learning aids such as individual earphone and microphone to interact directly with the trainer, moral education and orientation on foreign culture and custom etc.</p>

                     </blockquote>

                     <blockquote id="link2">
                        <h4>Housekeeping</h4>
                        <p>Hands-on housework using modern equipment such as usage of vacuum cleaner, washing machine, and related knowledge in maintaining household furniture and appliances etc.</p>

                     </blockquote>

                     <blockquote id="link3">
                        <h4>Basic cooking class</h4>
                        <p>Hand-on training on basic Singapore cooking and operations of kitchen equipment such as electrical kettle, stove, oven etc.</p>

                     </blockquote>


                </div>
               <div class="col-md-6">
                   <img src="{{asset('images/Training.jpg')}}" />
               </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <blockquote id="link4">
                        <h4>Caregiving for infant and toddler</h4>
                        <p>Unlike others, we observe the most efficient and cost-effective way to train the FDWs in host countries rather than in Singapore. Besides, training in Singapore can prove to be too costly and come with some limitations. Constraints such as time, mental adjustment and adaptation for the new arrival FDWs could pose a great challenge for them to cope and learn optimally.
                        </p>
                        <p>
                            For those FDWs that require special skills training especially in looking after the elderly patients that require special care, we have already accredited with a licensed local provider such as Aaxonn Pte Ltd. which is an approved Caregiver Training Provider under Agency for Integrated Care (AIC).
                        </p>
                     </blockquote>

                </div>

            </div>

        </div>
     </div>
     <div class="section">

            <h2 class="heading-bottom text-center">Training gallery</h2>
            <div uk-slider>

                <div class="uk-position-relative">

                    <div class="uk-slider-container uk-light traning-gallery">
                        <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-3@m">
                            @foreach($training as $rec)
                            <li>
                                <img src="{{asset('storage/training_images')}}/{{$rec->training_image}}" onclick="openLightBox('{{$rec->training_id}}')" id="{{$rec->training_id}}" alt="">
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="uk-hidden@s uk-light">
                        <a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
                    </div>

                    <div class="uk-visible@s">
                        <a class="uk-position-center-left-out uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right-out uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
                    </div>

                </div>

                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

            </div>


     </div>
     <div id="myModal" class="modal">
        <span class="close" onclick="closeModel()">&times;</span>
        <img class="modal-content" id="img01">
      </div>
     <script>
        function openLightBox(id){
              // Get the modal
          var modal = document.getElementById("myModal");

          // Get the image and insert it inside the modal - use its "alt" text as a caption
          var img = document.getElementById(id);
          var modalImg = document.getElementById("img01");
          img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
          }


        }
        function closeModel(){
          var modal = document.getElementById("myModal");
             // Get the <span> element that closes the modal
          var span = document.getElementsByClassName("close")[0];

          // When the user clicks on <span> (x), close the modal
          span.onclick = function() {
            modal.style.display = "none";
          }
        }
          </script>
@endsection
