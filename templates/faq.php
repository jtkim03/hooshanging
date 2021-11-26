<?php include("base.php")?>
  <!--FAQ Section-->
  <h1 class = "display-4" style = "text-align: center; margin-top: 4vh; margin-bottom: 4vh; font-family: 'Staatliches', cursive;">
    Frequently Asked Questions
  </h1>
  <div class = "container">
<div id="accordion">
    <div class="card">
      <div class="card-header faq" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            What is this app about?
          </button>
        </h5>
      </div>
  
      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
          Hoos Hitchhiking is a website that was inspired by Uber and Hoos Driving (a Facebook group chat). 
          The website will be a combination of the two inspirations. Hoos Hitchhiking is only for verified UVA students. 
          Students will be able to request drivers and offer a certain amount of money. Drivers could also offer their services and 
          request a certain amount of money. That way, this will provide students safe passage and an easy way to make money. 
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header faq" id="headingTwo">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Is this app dangerous to use?
          </button>
        </h5>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header faq" id="headingThree">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Can anybody use this app?
          </button>
        </h5>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">
          No, to foster a safe environment, this application is closed to only UVA students.
        </div>
      </div>
    </div>
  </div>
</div>
<?php include("footer.php")?>