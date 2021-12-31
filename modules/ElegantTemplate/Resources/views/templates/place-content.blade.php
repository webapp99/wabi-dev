<style>
    .catal {
        margin-left: 0.8%;
    }

    .myCent {
        text-align: center;
    }
	.myCentre{
      display:flex !important;
    	justify-content:center !important;
    align-content:center !important;
      flex-direction:column !important;
    }
    .myCate {
        background: white;
        color: black;
    }

    .myCate:hover {
        background: purple;
        color: white;
        text-decoration: none !important;
    }
  	.myCat{
    	display:flex;
    	justify-content: flex-start;
    	height: 100%;
  }
  .leM{
    color: #0F012B !important;
  }


  .myCo{
    height : 58px !important;
    border: none !important;
  }
  .myTop{
    margin-top : 30px ;
  }
  .myTake{
    width : 150px;
    background : #f8f5f2;
  }
  
  .myTxtw{
    color:white !important;
    margin-right : 15px;
  }
  
  .myBack{
    background: #fffdf0 !important;
  }
  .myCoul{
    color : #0F012B !important;
  }
  .myImCat{
    width : 100% !important;
    border-radius : 2px 2px 0px 0px;
  }
  .muf{
    background : #f8f5f2 !important;
  }
  

    @media only screen and (max-width: 600px) {

        .catal {
            margin-left: 3.5% !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center;
        }
      .  .myTop{
    margin-top : 30px !important;
  }

      	.myRes{
    		width : 100%;
          height: 250px !important;
  		}
        .myCent {
            text-align: center;
            margin-left: 45%;
        }

        .myCate {
            margin-top: 5%;
            margin-bottom: 5%;
        }
      	.muf{
   	 		margin-top : 2%;
        	margin-bottom : 1%;
  	}
       .myDeco{
    		margin : 0px 16px;
  		}
       .myImCat{
    		width : 100% !important;
       		 height: 100% ;
  }
      .myTxtw{
    		margin-right : 0px;
        margin-left: 3px;
  }
      .myTake{
		width : 150px !important;
      }
      .myBg{
    	background : white !important; 
   		 width: 100% !important;
   		 height : 75px;
       	 position : fixed; 
        bottom : 0px; 
        right: 0px;
        z-index : 1000 !important;
  }
      .myIco{
        position : fixed;
        bottom: 26px;
        left: 50px;
        z-index : 1000;
        font-size : 27px;
      }
      
  
    }
  
    .myProd {
        width: 100% !important;
    }
</style>
<!-- section-place-content-menu -->
<section class='section section-place-content-menu  muf  '>

    <div class='packer'>

        <div class="package ">
            <div class="text-center">
                
                <div>
        
   			@if(!$restorant->categories->isEmpty())
        	<nav class="tabbable sticky" style="top: {{ config('app.isqrsaas') ? 64:88 }}px;">
                <!--<ul class="nav nav-pills bg-white mb-2">
                     <li class="nav-item  ">
                        <a class="nav-link  mb-sm-3 mb-md-0 active" data-toggle="tab" role="tab" href="">{{ __('All categories') }}</a>
                    </li> -->
                   
                        
                            
                  <div class="swiper mySwiper">
      <div class="swiper-wrapper">
         @foreach ( $restorant->categories as $key => $category)
        <div class="nav-item swiper-slide" >
                                <a class="btn  nav-link mb-sm-3 mb-md-0 leM"   
                                   href="#subsection-<?php echo $category->id; ?>">{{ $category->name }}</a>
                            </div>
        @endforeach
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      
    </div>
                        
                    
                <!--</ul>-->

                
            </nav>

            
            @endif
                </div>
              
            </div>

	
        </div>
    </div>
</section>
<!-- section-place-content -->
<section class="section section-place-content">
    <div class="container-fluid">
      
                  <div class="myBg">

      
        <div id="theCartBottomButton" onClick="openNav()" class=" close-mobile-menu circle callOutShoppingButtonBottom icon icon-shape bg-gradient-red text-white rounded-circle shadow mb-2" style=" background: linear-gradient(87deg, #ffffff 0, #ffffff 100%) !important;">
          <button class="btn btn-primary custom--cart myCo myUbuntu" style="background :  #0F012B">
                Checkout
              </button>
         	
                                          <i style="color : white;" class="las la-shopping-bag myIco"></i>
                                          
        </div>
      </div>
        <div class='row'>
            @if(!$restorant->categories->isEmpty())
            @foreach ( $restorant->categories as $key => $category)
            
            <div id='subsection-<?php echo $category->id; ?>' class='box-info'>
                    
                <div class=' align-center myDeco myTop myUbuntu' style="background:none;border-radius:none;">
                
                    @if($category->logom)

                        <img id="previewImg" class="img-fluid  myImCat" src="<?php echo $category->logom;?>" alt="..." /> 

                    @endif
                </div>
                <div class='head  myDeco'>
                    <h2 class="myTxtw myUbuntu"><?php echo $category->name; ?></h2>
                </div>


                <!-- PRODUCT CARD START -->

                <div class='row mt-3'>
                    @foreach ($category->aitems as $item)
                    <div class="col-md-3" style="width: 18rem;">
                        <img src="{{ $item->logom }}" class="img-fluid myRes" alt="...">
                        <div class="card-body myBack ">
                            <h5 class="card-title myCoul">{{ $item->name }}</h5>
                            <p class="card-text myCoul">{{ $item->short_description}}</p>
                            <!-- class="extras" -->
                           <div class="price-btn-wrap"> <div class='price myCoul'>@money($item->price, config('settings.cashier_currency'),config('settings.do_convertion'))</div>
                            <a href='javascript:;' onClick="setCurrentItem({{ $item->id }})" class='item-offer-horizontal'>

                                <div class="quantity-btn">
                                    <div id="addToCart1">
                                        <button class="btn btn-primary" style="background : #0F012B;" v-on:click='addToCartAct'> <h3>
                                          <i style="color : white;" class="las la-shopping-bag"></i>
                                          </h3></button>
                                    </div>
                                </div>
                            </a>
                          </div>

                            <div class="allergens">
                                @foreach ($item->allergens as $allergen)
                                <div class='allergen' data-toggle="tooltip" data-placement="bottom" title="{{$allergen->title}}">
                                    <img src="{{$allergen->image_link}}" />
                                </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                  

                    @endforeach
                </div>

                <!-- PRODUCT CARD END -->


            </div>

            @endforeach
            @endif





        </div>

        <div class="row show_info">
            <div id='place-info' class='col-md-12'>
                <div class='full-width'>
                    <div class='box-info'>
                        <div class='head myTw'>
                            <h3><i class="las la-map-marker"></i>{{ __('Address') }}</h3>
                            <div class='info'>
                                <p><strong>{{ $restorant->address }}</strong></p>
                                <p>{{ $restorant->phone }}</p>
                            </div>
                        </div>
                        <div class='content'>
                            <div class='schedule-map'>
                                <div class='schedule'>
                                    <h4>Hours</h4>
                                    <ol class='items'>
                                        @foreach ($wh as $day=>$hours)
                                        <li>
                                            @if ($day==$currentDay)
                                            <div class='day'>{{ __(ucfirst($day))}}
                                                <span class='tag'>
                                                    {{ __('Today') }}
                                                </span>
                                            </div>
                                            @else
                                            <div class='day'>{{ __(ucfirst($day))}} </div>
                                            @endif
                                            @foreach ($hours as $timeRange)
                                            <div class='hours'>{{ $timeRange->start() }} - {{ $timeRange->end() }} </div>
                                            @endforeach

                                        </li>
                                        @endforeach

                                    </ol>

                                </div>
                                <div class="map">
                                    <iframe src="https://maps.google.com/maps?q={{ $restorant->lat }},{{ $restorant->lng }}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class='holder-right'>
                <!-- New cart -->
                @include('elegant-template::templates.side_cart',['id'=>'cartList','idtotal'=>'totalPrices'])
                <!-- End New cart -->
            </div>
        </div>

    </div>
</section>
<section class='section section-place-content' style="display: none;">
    <div class='packer'>

        <div class='packer'>
            <div id="theCartBottomButton" onClick="openNav()" class=" close-mobile-menu circle callOutShoppingButtonBottom icon icon-shape bg-gradient-red text-white rounded-circle shadow mb-4" style=" background: linear-gradient(87deg, #ffffff 0, #ffffff 100%) !important;">
                <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_atunf5kv.json" background="transparent" speed="0.5" style="width: 50px; height:50px;" loop autoplay></lottie-player>
            </div>
            <div class='content'>

                <!-- tab menu -->
                <!-- <div id='place-menu' class='holder-left content-tab expanded'>
                    <div class='content-left'>

                        <div class='categories'>
                            <div class='categories_title'>{{__('Categories')}}</div>
                            <nav>




                            </nav>



                            @if (count($allergens)>0)

                            <br /><br />
                            <div class='categories_title'>{{__('Allergens')}}</div>
                            <nav>

                                @foreach ( $allergens as $key => $allergen)

                                <div class='item'>
                                    <div class='allergen'>
                                        <img src="{{$allergen->image_link}}" />
                                    </div>
                                    <?php echo " " . $allergen->title ?>
                                </div>

                                @endforeach


                            </nav>

                            @endif

                        </div> 
                    </div>-->
                <!-- <div class='content-center'> -->

            </div>

            <!-- tab info -->
            <div id='place-info11' class=' content-tab'>
                <div class='full-width'>
                    <div class='box-info'>
                        <div class='head'>
                            <h3 ><i class="las la-map-marker"></i>{{ __('Address') }}</h3>
                            <div class='info'>
                                <p ><strong>{{ $restorant->address }}</strong></p>
                                <p >{{ $restorant->phone }}</p>
                            </div>
                        </div>
                        <div class='content'>
                            <div class='schedule-map'>
                                <div class='schedule'>
                                    <h4>Hours</h4>
                                    <ol class='items'>
                                        @foreach ($wh as $day=>$hours)
                                        <li>
                                            @if ($day==$currentDay)
                                            <div class='day'>{{ __(ucfirst($day))}}
                                                <span class='tag'>
                                                    {{ __('Today') }}
                                                </span>
                                            </div>
                                            @else
                                            <div class='day'>{{ __(ucfirst($day))}} </div>
                                            @endif
                                            @foreach ($hours as $timeRange)
                                            <div class='hours'>{{ $timeRange->start() }} - {{ $timeRange->end() }} </div>
                                            @endforeach

                                        </li>
                                        @endforeach

                                    </ol>

                                </div>
                                <div class="map">
                                    <iframe src="https://maps.google.com/maps?q={{ $restorant->lat }},{{ $restorant->lng }}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class='holder-right'>
                <!-- New cart -->
                @include('elegant-template::templates.side_cart',['id'=>'cartList','idtotal'=>'totalPrices'])
                <!-- End New cart -->
            </div>
        </div>
    </div>
    <!-- </div> -->




</section>
