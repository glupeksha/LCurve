  <!--Dashboard start-->
  <div class="row dash">

      <!--Dashboard Left Margin-->
      <div class="col-lg-1">
      </div>

      <!--Dashboard Content start-->
      <div class="col-lg-10 col-border full">
          
        <div class="row row-border full">

          <!--Dashboard Left Bar start-->
          <div class="col-lg-9 col1 full">
            
            @yield('dash-left')

          </div>
          <!--Dashboard Left Bar end-->

          <!--Dashboard Right Bar start-->
          <div class="col-lg-3 col2 full">
            

            <!--Calander start-->
            <div class="custom-calendar-wrap">
              <div id="custom-inner" class="custom-inner">
                <div class="custom-header clearfix">
                  <nav>
                    <span id="custom-prev" class="custom-prev"></span>
                    <span id="custom-next" class="custom-next"></span>
                  </nav>
                  <h2 id="custom-month" class="custom-month"></h2>
                  <h3 id="custom-year" class="custom-year"></h3>
                </div>
                <div id="calendar" class="fc-calendar-container"></div>
              </div>
            </div>
            <!--Calander end-->




            @yield('dash-right')
          </div>
          <!--Dashboard Right Bar end-->

        </div>

      </div>
      <!--Dashboard Content end-->

      <!--Dashboard Right Margin-->
      <div class="col-lg-1">
      </div>

  </div>
<!--Dashboard end-->
<!--Footer start-->
<div class="row">
    <div class="col-lg-1">
    </div>
    <div class="col-lg-10 col3">
    </div>
    <div class="col-lg-1">
    </div>
</div>
<!--Footer end-->