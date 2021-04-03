     <footer>
         <div class="content-wrapper">
             <h3>The Meals On Wheels Foundation
                 <span>of Northern Illinois</span>
                 <span>Corporate Volunteering</span>
             </h3>
         </div>
     </footer>
     <?php wp_footer(); ?>
     <script>
         // spotlight partners slideshow
         var slideIndex = 1;
         showSlides(slideIndex);
         // next/previous controls
         function plusSlides(n) {
             showSlides(slideIndex += n);
         }
         //slideshow
         function showSlides(n) {
             var i;
             var companySlides = document.getElementsByClassName("mySlides");
             if (n > companySlides.length) {
                 slideIndex = 1;
             }
             if (n < 1) {
                 slideIndex = companySlides.length;
             }
             for (i = 0; i < companySlides.length; i++) {
                 companySlides[i].style.display = "none";
             }
             companySlides[slideIndex - 1].style.display = "block";
         }
     </script>
     </body>

     </html>