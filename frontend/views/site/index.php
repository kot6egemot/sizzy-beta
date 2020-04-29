<?php

/* @var $this yii\web\View */

$this->title = 'Страница редактирования';
?>
<script>
    document.getElementsByTagName("html")[0].className += " js";
</script>
<div id="temp-svg" style="position: absolute; left: -99999px;"></div>
<div class="flex@md">
    <aside class="sidebar sidebar--static@md js-sidebar" id="sidebar" aria-labelledby="sidebarTitle">
        <div class="sidebar__panel">
            <header class="sidebar__header">
                <div class="Brand">Color Project</div>
                <button class="reset sidebar__close-btn js-sidebar__close-btn js-tab-focus">
                    <svg class="icon" viewBox="0 0 16 16">
                        <title>Close panel</title>
                        <g stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10">
                            <line x1="13.5" y1="2.5" x2="2.5" y2="13.5"></line>
                            <line x1="2.5" y1="2.5" x2="13.5" y2="13.5"></line>
                        </g>
                    </svg>
                </button>
            </header>

            <div class="sidebar__content">
                <!-- start sidebar content -->
                <div class="text-component padding-md">
                    <!--         <form class="form-inline md-form mb-0 w-100 form-sm mt-0">
  <i class="fas fa-search" aria-hidden="true"></i>
  <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
    aria-label="Search"> 
</form> -->


                    <div class="search-input search-input--icon-right">
                        <input class="form-control width-100%" type="search" name="searchInputX" id="searchInputX" placeholder="Search...">
                        <button class="search-input__btn">
                            <svg class="icon" viewBox="0 0 24 24">
                                <title>Search</title>
                                <g stroke-linecap="square" stroke-linejoin="miter" stroke-width="2" stroke="currentColor" fill="none" stroke-miterlimit="10">
                                    <line x1="22" y1="22" x2="15.656" y2="15.656"></line>
                                    <circle cx="10" cy="10" r="8"></circle>
                                </g>
                            </svg>
                        </button>
                    </div>




                    <section class="category-section">
                        <div class="container m-0 p-0 max-width-sm">

                            <ul class="accordion  js-accordion category-container mb-0" data-animation="on" data-multi-items="off">

                            </ul>
                        </div>
                    </section>

                    <section class="font-section" style="display: none;">
                        <div class="container m-0 p-0 max-width-sm">
                            
                            
                            <div class="d-flex align-items-center justify-content-between">
                               <button class="button-no-active shadow_none btn btn--primary button-studio category-button"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M9.41436 11.9999L16.7073 19.2928L15.293 20.707L6.58594 11.9999L15.293 3.29282L16.7073 4.70703L9.41436 11.9999Z" fill="#393939"/>
</svg></button>
                            
                         
                            
                            
                        
                            <div class="current-font">Current</div>
                        
                            
                            </div>
                            <ul class="fonts-list mt-0">

                            </ul>
                            <style>
                                .fonts-list {
                                    margin-top: 10px;
                                }
                            </style>
                        </div>
                    </section>

                    <section class="html-list-section" style="display: none; margin-top: 10px;">
                              <div class="d-flex align-items-center justify-content-between">
                               <button class="button-no-active shadow_none btn btn--primary button-studio category-button"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M9.41436 11.9999L16.7073 19.2928L15.293 20.707L6.58594 11.9999L15.293 3.29282L16.7073 4.70703L9.41436 11.9999Z" fill="#393939"/>
</svg></button>
                            
                         
                            
                            
                        
                            <div class="id-name">Название шаблона</div>
                        
                            
                            </div>
                        <div class="html-list-container">

                        </div>
                    </section>



                </div>
                <!-- end sidebar content -->









            </div>
        </div>
    </aside>

    <main class="w-100 position-relative no-main-svg">
        <!-- start main content -->
        <div class="position-absolute fixed-top">

            <div class="border-bottom index-2 card w-100">
                <div class="top-menu d-flex p-2 card-body index-2 justify-content-between ">

                    <div class="text-center flex-column">

                        <button class="button-no-active shadow_none btn btn--primary button-studio" aria-controls="sidebar"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2 3V14C0.89543 14 0 13.1046 0 12V2C0 0.89543 0.89543 0 2 0H12C13.1046 0 14 0.89543 14 2H3C2.4477 2 2 2.4477 2 3ZM5 17V6C5 5.4477 5.4477 5 6 5H17C17 3.8954 16.1046 3 15 3H5C3.8954 3 3 3.8954 3 5V15C3 16.1046 3.8954 17 5 17ZM8 6H18C19.1046 6 20 6.8954 20 8V18C20 19.1046 19.1046 20 18 20H8C6.8954 20 6 19.1046 6 18V8C6 6.8954 6.8954 6 8 6ZM18 18V8H8V18H18Z" fill="#393939" />
                            </svg></button>
                        <a class="button-no-active shadow_none btn btn--primary button-studio" href="http://sizze.io/about/for-designers.html"><svg class="m-inherit" width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.8887 8L10.89 1.99867L16.8913 8H16.89V18H4.89V8H4.8887ZM2.89001 9.9987L1.4132 11.4755L0 10.0623L9.477 0.585293C10.2574 -0.195098 11.5226 -0.195098 12.303 0.585293L21.78 10.0623L20.3668 11.4755L18.89 9.9987V18C18.89 19.1046 17.9946 20 16.89 20H4.89C3.7854 20 2.89001 19.1046 2.89001 18V9.9987Z" fill="#393939" />
                            </svg></a>
                    </div>

                    <div class="text-center flex-column">
                        
               <!--         
                        
                          <button class='export-pdf k-button'>Export as PDF</button>
                        
                         <button class='export-img k-button'>Export as Image</button>
                        
                        <button class='export-svg k-button'>Export as SVG</button>-->

                        <button class="button-no-active shadow_none btn btn--primary button-studio"><svg width="21" height="17" viewBox="0 0 21 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.4144 6.00007H10.0002C17.8691 6.00007 21.0002 9.25637 21.0002 17.0001H19.0002C19.0002 10.3438 16.7466 8.00007 10.0002 8.00007H4.4144L8.7073 12.293L7.293 13.7072L0.585938 7.00007L7.293 0.292969L8.7073 1.70717L4.4144 6.00007Z" fill="#393939" />
                            </svg>
                        </button>
                        <button class="button-no-active shadow_none btn btn--primary button-studio"><svg width="21" height="17" viewBox="0 0 21 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M16.5858 6.00007L12.2929 1.70717L13.7071 0.292969L20.4142 7.00007L13.7071 13.7072L12.2929 12.293L16.5858 8.00007H11C4.2536 8.00007 2 10.3438 2 17.0001H0C0 9.25637 3.1311 6.00007 11 6.00007H16.5858Z" fill="#393939" />
                            </svg></button>

                        <!-- <input type="text" placeholder="Градус" class="rotate-input" style="display: none;"> -->

                        <!--       <div class="def-number-input number-input safari_only">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus size-tool"></button>
                                <input class="scale" min="0" name="scale" value="100" type="number">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus size-tool"></button>
                            </div> -->


                        <!--  <input class="scale" type="text" placeholder="Scale" value="100"> -->
                    </div>

                    <div class="text-center flex-column">

                        <!--      <button class="button-no-active shadow_none add btn btn--primary button-studio save-button" type="button" id="dropdownMenuMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            +
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuMenu">
                            <button class="dropdown-item add-item" value="text" type="button">Текст</button>
                        </div>-->

                        
                        
                         <button class="button-no-active shadow_none btn btn--primary button-studio">
                             <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M29 18C29 24.0751 24.0751 29 18 29C11.9249 29 7 24.0751 7 18C7 11.9249 11.9249 7 18 7C24.0751 7 29 11.9249 29 18ZM9 18C9 22.9706 13.0294 27 18 27C22.9706 27 27 22.9706 27 18C27 13.0294 22.9706 9 18 9C13.0294 9 9 13.0294 9 18ZM14 13C14 12.2146 14.864 11.7357 15.53 12.152L23.53 17.152C24.1567 17.5437 24.1567 18.4563 23.53 18.848L15.53 23.848C14.864 24.2643 14 23.7854 14 23V13ZM16 14.8042L21.1132 18L16 21.1958V14.8042Z" fill="#393939"/>
</svg>
                        </button>
                        

                        <button class="button-no-active shadow_none btn btn--primary button-studio"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 4C12 4.2874 12.0303 4.5678 12.0879 4.838L7.0169 7.3735C6.2836 6.5319 5.2039 6 4 6C1.79086 6 0 7.7909 0 10C0 12.2091 1.79086 14 4 14C5.2039 14 6.2836 13.4681 7.0169 12.6265L12.0879 15.162C12.0303 15.4322 12 15.7126 12 16C12 18.2091 13.7909 20 16 20C18.2091 20 20 18.2091 20 16C20 13.7909 18.2091 12 16 12C14.7961 12 13.7164 12.5319 12.9831 13.3735L7.9121 10.838C7.9697 10.5678 8 10.2874 8 10C8 9.7126 7.9697 9.4322 7.9121 9.162L12.9831 6.6265C13.7164 7.4681 14.7961 8 16 8C18.2091 8 20 6.2091 20 4C20 1.79086 18.2091 0 16 0C13.7909 0 12 1.79086 12 4ZM6 10C6 11.1046 5.1046 12 4 12C2.8954 12 2 11.1046 2 10C2 8.8954 2.8954 8 4 8C5.1046 8 6 8.8954 6 10ZM16 6C17.1046 6 18 5.1046 18 4C18 2.8954 17.1046 2 16 2C14.8954 2 14 2.8954 14 4C14 5.1046 14.8954 6 16 6ZM18 16C18 17.1046 17.1046 18 16 18C14.8954 18 14 17.1046 14 16C14 14.8954 14.8954 14 16 14C17.1046 14 18 14.8954 18 16Z" fill="#393939" />
                            </svg></button>


                        <button class="window-menu button-no-active shadow_none save btn btn--primary button-studio save-button save-button-menu" type="button">
                            
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" class="window-menu">
<path class="window-menu" fill-rule="evenodd" clip-rule="evenodd" d="M22.2929 15.2929L19 18.5858V8H17V18.5858L13.7071 15.2929L12.2929 16.7071L18 22.4142L23.7071 16.7071L22.2929 15.2929ZM28 26V22H26V26H10V22H8V26C8 27.1046 8.89543 28 10 28H26C27.1046 28 28 27.1046 28 26Z" fill="#393939"/>
</svg>
                            
                            
                        </button>
                        <div class="window-menu dropdown-menu dropdown-menu-save" aria-labelledby="dropdownMenuMenuFormat">
                       <!--     <button class="dropdown-item format-save-item" value="png" type="button">PNG</button>
                            <button class="dropdown-item format-save-item" value="jpeg" type="button">JPEG</button>
                            <button class="dropdown-item format-save-item" value="pdf" type="button">PDF</button> -->
                            
                            
                             <button class='dropdown-item format-save-item export-pdf'>Export as PDF</button>
                        
                         <button class='dropdown-item format-save-item export-img'>Export as Image</button>
                        
                        <button class='dropdown-item format-save-item export-svg'>Export as SVG</button>
                            
                        </div>


                        <!--
                            <button class="save btn btn--primary button-studio save-button"><img src="img/15.svg"></button>

-->
                    </div>


                </div>
            </div>
            <div class="w-100 no-main-svg">
                <div class="d-flex index-0 card-body justify-content-center no-main-svg">

                    <div class="index-2 plus_btn def-number-input number-input safari_only">
                        <button class="minus plus_btn size-tool size-tool-button"></button>
                        <input class="scale" min="0" name="scale" value="100" type="number">
                        <button class="plus plus_btn size-tool size-tool-button"></button>
                    </div>
                </div>

            </div>
        </div>


        <div class="container-fluid h-100 no-main-svg">

            <div class="row over justify-content-center h-100 no-main-svg main-svg-container">

                <div class="index-1 canvas1 align-self-center main-svg draggable" id='example'>
                    
               
                    
                </div>





                <!--    <div class="container h-100">

                <div class="row h-100">
                    <div class="align-self-center main-svg">

                    </div>
                
                </div>
            </div> -->
                <div class="position-absolute fixed-bottom">

                    <div class="index-0 w-100">
                        <div class="d-flex card-body justify-content-between">


                            
                            
                            <div class="card border-0 decoration index-2 tools-panel tools-panel-default d-flex justify-content-start">
                                
                                <div class="flex-column style-block-container hide">
                       
                                                                 <button id="" class="button-no-active shadow_none btn btn--primary button-studio">



                                     <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M17 22H10C8.92671 22 8 21.2057 8 20.1429V15.8571C8 14.7943 8.92671 14 10 14H17V8H19V14H26C27.0733 14 28 14.7943 28 15.8571V20.1429C28 21.2057 27.0733 22 26 22H19V28H17V22ZM10 16V20H26V16H10Z" fill="#393939"/>
</svg>

                                </button> 
                                                                 <button id="" class="button-no-active shadow_none btn btn--primary button-studio">


<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M20.1429 25H15.8571C14.7943 25 14 24.0733 14 23V10C14 8.92671 14.7943 8 15.8571 8H20.1429C21.2057 8 22 8.92671 22 10V23C22 24.0733 21.2057 25 20.1429 25ZM20 10H16V23H20V10ZM8 26V28H28V26H8Z" fill="#393939"/>
</svg>

                                     
                                </button> 
                                                                 <button id="" class="button-no-active shadow_none btn btn--primary button-studio">

<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8 8V10H28V8H8ZM20.1429 28H15.8571C14.7943 28 14 27.0733 14 26V13C14 11.9267 14.7943 11 15.8571 11H20.1429C21.2057 11 22 11.9267 22 13V26C22 27.0733 21.2057 28 20.1429 28ZM20 26V13H16V26H20Z" fill="#393939"/>
</svg>

                                     
                                </button> 
                                    
                                    
                                    
                                    
                                       <button id="" class="button-no-active shadow_none btn btn--primary button-studio">


<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M14 17V10C14 8.92671 14.7943 8 15.8571 8H20.1429C21.2057 8 22 8.92671 22 10V17H28V19H22V26C22 27.0733 21.2057 28 20.1429 28H15.8571C14.7943 28 14 27.0733 14 26V19H8V17H14ZM20 10H16V26H20V10Z" fill="#393939"/>
</svg>
                                     
                                </button> 
                                    
                                           
                                       <button id="" class="button-no-active shadow_none btn btn--primary button-studio">


<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M10 8H8V28H10V8ZM28 15.8571V20.1429C28 21.2057 27.0733 22 26 22H13C11.9267 22 11 21.2057 11 20.1429V15.8571C11 14.7943 11.9267 14 13 14H26C27.0733 14 28 14.7943 28 15.8571ZM13 16V20H26V16H13Z" fill="#393939"/>
</svg>

                                     
                                </button> 
                                    
                                    
                                              <button id="" class="button-no-active shadow_none btn btn--primary button-studio">

<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M28 8H26V28H28V8ZM25 15.8571V20.1429C25 21.2057 24.0733 22 23 22H10C8.92671 22 8 21.2057 8 20.1429V15.8571C8 14.7943 8.92671 14 10 14H23C24.0733 14 25 14.7943 25 15.8571ZM10 16V20H23V16H10Z" fill="#393939"/>
</svg>


                                     
                                </button> 
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
                                
                                         
                                
                    </div>
                            
                            
                            
                            
                            
                            
                            
                            
                                           <div class="card border-0 decoration index-2 tools-panel tools-panel-default d-flex justify-content-start ">
                                
                                <div class="flex-column style-text-container hide">
                       
                                
                                 <button id="" class="button-no-active shadow_none btn btn--primary button-studio">
                                   <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M28 13V11H8V13H28ZM22 15V17H8V15H22ZM28 21V19H8V21H28ZM22 25V23H8V25H22Z" fill="#393939"/>
</svg>

                                     
                                </button>   
                                
                                 <button id="" class="button-no-active shadow_none btn btn--primary button-studio">
                                  <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M28 13V11H8V13H28ZM25 15V17H11V15H25ZM28 21V19H8V21H28ZM25 25V23H11V25H25Z" fill="#393939"/>
</svg>

                                     
                                </button> 
                                    
                                    
                                    
                                                    <button id="" class="button-no-active shadow_none btn btn--primary button-studio">
<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M28 13V11H8V13H28ZM28 15V17H14V15H28ZM28 21V19H8V21H28ZM28 25V23H14V25H28Z" fill="#393939"/>
</svg>


                                     
                                </button> 
                                    
                                    
                                                                               <button id="" class="button-no-active shadow_none btn btn--primary button-studio">



                                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M28 13V11H8V13H28ZM28 15V17H8V15H28ZM28 21V19H8V21H28ZM28 25V23H8V25H28Z" fill="#393939"/>
</svg>
 
                                </button> 
                                    
                                                            
                                </div>
                                
                                         
                                
                    </div>
                            
                            
                            
                            
                            
                            
                            
                            <button class="button-no-active-plus index-2 shadow_none add btn btn--primary button-studio save-button" type="button" id="dropdownMenuMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="30" cy="30" r="30" fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M31 29H40V31H31V40H29V31H20V29H29V20H31V29Z" fill="#393939" />
                                </svg>

                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuMenu">
                                <button class="dropdown-item label_color_16 add-item" value="text" type="button">Текст</button>
                                <button class="dropdown-item label_color_16 add-item" type="img" type="button">Изображение</button>
                            </div>



                        </div>

                    </div>

                    <!--    <div class="m-5 def-number-input number-input safari_only">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus size-tool"></button>
                                <input class="scale quantity" min="0" name="quantity" value="100" type="number">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus size-tool"></button>
                            </div>-->

                    <!-- default panel -->
                    <div class="menu-bottom card w-100 a border-0 b index-2 tools-panel tools-panel-default border-top">
                        <div class="d-flex card-body index justify-content-around">
                            <p class="m-0 label_color">Выберите элемент</p>
                        </div>
                    </div>

                    <!-- text panel -->
                    <div style="display: none;" class=" index-2 card w-100 a border-0 b tools-panel tools-panel-text">
                        <div class="d-flex card-body index justify-content-around c" data-tools="defalt">

                            <!-- Container -->
                            <div class="flex flex-column items-start tool-item font-tool">
                                <button class="current-font shadow_none btn_main fonts btn btn-primary my-font" type="button">
                                    current
                                </button>
                            </div>

                            <!-- Container -->
                            <div class="text-center flex-column tool-item color-tool">
                                <button class=" btn color-picker button-studio btn--primary m"></button>
                            </div>

                            <!-- Container -->
                            <div class="text-center flex-column tool-item size-tool">
                                <!-- <p class="m-0 label_color">Размер</p> -->
                                <div class="def-number-input number-input safari_only">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus size-tool"></button>
                                    <input class="quantity current-font-size" min="0" name="quantity" value="1"  type="number">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus size-tool"></button>
                                </div>
                            </div>

                                                                                                                                         
                                        <!-- Container -->
                            <div class="text-center flex-column tool-item style-tool">
                                                                                     
                                                              <button id="style-block" class="button-no-active shadow_none btn btn--primary button-studio">
                                   <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M17 22H10C8.92671 22 8 21.2057 8 20.1429V15.8571C8 14.7943 8.92671 14 10 14H17V8H19V14H26C27.0733 14 28 14.7943 28 15.8571V20.1429C28 21.2057 27.0733 22 26 22H19V28H17V22ZM10 16V20H26V16H10Z" fill="#393939"/>
</svg>
                                </button>       
                                                                                <button id="style-text" class="button-no-active shadow_none btn btn--primary button-studio">
                                   <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M28 13V11H8V13H28ZM25 15V17H11V15H25ZM28 21V19H8V21H28ZM25 25V23H11V25H25Z" fill="#393939"/>
</svg>
                                </button>    
                                                                                     </div>
                                                                                                                                         
                            <!-- Container -->
                            <div class="text-center flex-column tool-item style-tool">
                                <!--    <p class="m-0 label_color">Стиль</p> -->
                                <button id="underline" class="button-no-active shadow_none btn btn--primary button-studio">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="24 / basic / text-underline">
                                            <path id="icon" fill-rule="evenodd" clip-rule="evenodd" d="M19 2H17V11C17 14.3137 15.3137 16 12 16C8.68629 16 7 14.3137 7 11V2H5V11C5 15.4183 7.58172 18 12 18C16.4183 18 19 15.4183 19 11V2ZM4 20V22H20V20H4Z" fill="#393939" />
                                        </g>
                                    </svg>
                                </button>
                                <button id="weight" class="button-no-active btn shadow_none btn--primary button-studio text-style">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.4297 11.348C18.5154 12.1296 20 14.1414 20 16.5C20 19.5376 17.5376 22 14.5 22H6V2H12.5C15.5376 2 18 4.46243 18 7.5C18 8.99801 17.4011 10.3562 16.4297 11.348ZM12.5 11C14.433 11 16 9.433 16 7.5C16 5.567 14.433 4 12.5 4H8V11H12.5ZM8 20V13H14.5C16.433 13 18 14.567 18 16.5C18 18.433 16.433 20 14.5 20H8Z" fill="#393939" />
                                    </svg>
                                </button>
                                <button id="style" class="button-no-active btn shadow_none btn--primary button-studio text-style">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.8022 4L11.2466 20H15V22H5.5V20H9.19783L12.7534 4H9.5V2H19V4H14.8022Z" fill="#393939" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Container -->
                            <div class="text-center flex-column tool-item file-tool">
                                <fieldset class="file-upload">
                                    <label for="upload1" class="btn_upload shadow_none file-upload__label btn btn--subtle h-36">
                                        <span class="file-upload__text file-upload__text--has-max-width">Загрузить изображение</span>
                                    </label>
                                    <input type="file" class="file-upload__input" name="upload1" id="upload1">
                                </fieldset>
                            </div>

                            <!-- Container -->
                            <div class="text-center flex-column tool-item delete-tool">
                                <button id="style" class="delete-button button-no-active btn shadow_none btn--primary button-studio text-style">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9 1H15C16.1046 1 17 1.89543 17 3V4H20C21.1046 4 22 4.89543 22 6V8C22 9.10457 21.1046 10 20 10H19.9199L19 21C19 22.1046 18.1046 23 17 23H7C5.89543 23 5 22.1046 5.00345 21.083L4.07987 10H4C2.89543 10 2 9.10457 2 8V6C2 4.89543 2.89543 4 4 4H7V3C7 1.89543 7.89543 1 9 1ZM4 6H7H17H20V8H4V6ZM6.08649 10H17.9132L17.0035 20.917L17 21H7L6.08649 10ZM15 3V4H9V3H15ZM13.4142 15L15.7071 17.2929L14.2929 18.7071L12 16.4142L9.70711 18.7071L8.29289 17.2929L10.5858 15L8.29289 12.7071L9.70711 11.2929L12 13.5858L14.2929 11.2929L15.7071 12.7071L13.4142 15Z" fill="#393939" fill-opacity="0.9" />
                                    </svg>
                                </button>
                            </div>

                        </div>
                    </div>


                    <div class="font-container item-start collapse" id="collapseExample">

                        <form>

                            <div class="p-4 shadow_none card">
                                <div class="search-input search-input--icon-right ">
                                    <input class="form-control width-100%" type="search" name="searchInputX" id="searchInputX" placeholder="Search...">
                                    <button class="search-input__btn">
                                        <svg class="icon" viewBox="0 0 24 24">
                                            <title>Search</title>
                                            <g stroke-linecap="square" stroke-linejoin="miter" stroke-width="2" stroke="currentColor" fill="none" stroke-miterlimit="10">
                                                <line x1="22" y1="22" x2="15.656" y2="15.656"></line>
                                                <circle cx="10" cy="10" r="8"></circle>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                            </div>


                            <div class="shadow_none block-font p-4 card">
                                <fieldset>


                                    <!--     <ul class="fonts-list radio-list flex flex-column flex-gap-xxxs">
                                        <li>
                                            <input data-src="uploads/fonts/comfortaa/Comfortaa[wght].ttf" class="fonts-item radio" type="radio" name="radioButton" id="radio1" checked>
                                            <label for="radio1">Comfortaa</label>
                                        </li>
                                    </ul>-->

                                    <div class="list-group">

                                    </div>
                                </fieldset>
                            </div>
                        </form>

                    </div>




                    <!--  <div class="format-container collapse" id="collapseExample1">

                    <form>
                        <div class=" p-4 card">
                            <fieldset>
                                <legend class="form-legend">Выберете формат</legend>

                                <ul class="radio-list flex flex-column flex-gap-xxxs format-save">
                                    <li>
                                        <input class="format-save-item radio" type="radio" name="radioButton" id="radio12" value="png" checked>
                                        <label for="radio12">PNG</label>
                                    </li>

                                    <li>
                                        <input class="format-save-item radio" type="radio" name="radioButton" id="radio13" value="jpeg">
                                        <label for="radio13">JPEG</label>
                                    </li>

                                    <li>
                                        <input class="format-save-item radio" type="radio" name="radioButton" id="radio14" value="pdf">
                                        <label for="radio14">PDF</label>
                                    </li>
                                </ul>
                            </fieldset>
                        </div>
                    </form>

                </div>-->
                </div>

                <!-- end main content -->
    </main>
</div>

<div class="list-group contextmenu">
    <button type="button" class="list-group-item list-group-item-action">Текст</button>
    <button type="button" class="list-group-item list-group-item-action">Изображение</button>
</div>
        
        
        
        
        <script>
            
    </script>
        
        