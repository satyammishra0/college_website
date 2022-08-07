   <style>
       section>h2 {
           text-align: center;
       }

       span {
           color: #44c698;
           font-weight: bold;
       }


       /* ----------------------------- */


       /* ---------header---------- */


       /* ----------------------------- */

       .header {
           position: sticky;
           top: 0;
           left: 0;
           justify-content: space-between;
           align-items: center;
           background-color: #000;
           color: #fff;
           padding: 1% 5%;
           z-index: 1;
       }

       .nav-list {
           gap: 20px;
       }

       .nav-list>li>a {
           font-size: 18px;
           color: #fff;
           text-transform: uppercase;
       }
   </style>

   <!-- ----------------------------- -->
   <!-- ------ HEADER SECTION -------- -->
   <!-- ----------------------------- -->
   <header class="header flex">
       <img src="../assets/images/logo.png" alt="LOGO og our institute">
       <nav class="nav">
           <ul class="nav-list flex">
               <li class="nav-links text"><a href="#">home</a></li>
               <li class="nav-links text"><a href="#">About</a></li>
               <li class="nav-links text"><a href="#">Courses</a></li>
               <li class="nav-links text"><a href="#">events</a></li>
               <li class="nav-links text"><a href="#">news</a></li>
           </ul>
       </nav>
   </header>