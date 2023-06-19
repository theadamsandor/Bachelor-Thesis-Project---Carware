
            <section id="first">
                <div class="slide img-fluid justify-content-center">
                    <div class="container">


                        <div class="container">
                            <div class="row d-md-flex pt-3">
                                <div class="slide-col col-md-4 d-flex justify-content-center">
                                    <div id="option-1" title="" class="uslugi d-md-inline-block uslugi-gear"> <img class="gear" src="inc/css/img/gear.png" width="150px" height="150px"> <br><br>Ajánlat az Ön számára</div>
                                </div>
                                <div class="slide-col col-md-4 d-flex justify-content-center">
                                    <div id="option-2" title="" class="uslugi d-md-inline-block uslugi-map"> <img class="map" src="inc/css/img/placeholder.png" width="150px" height="150px"> <br><br>Dunaújváros</div>
                                </div>
                                <div class="slide-col col-md-4 d-flex justify-content-center">
                                    <div id="option-3" title="" class="uslugi d-md-inline-block uslugi-phone"> <img class="phone" src="inc/css/img/phone.png" width="150px" height="150px"> <br><br>Telefonos támogatás</div>
                                </div>
                            </div>
                        </div>

                        <div class="row uslugi-xs-container d-flex justify-content-center ml-1 mr-1 ">
                            <div id="optionxs-1" class="col-12 uslugi-xs d-md-none uslugi-gear">
                                <img class="float-left gear" src="css/img/gear.png" width="50px" height="50px">
                                <div class="mt-1">Ajánlat az Ön számára</div>
                            </div>
                            <div id="optionxs-2" class="col-12 uslugi-xs d-md-none uslugi-map">
                                <img class="float-left map" src="css/img/placeholder.png" width="50px" height="50px">
                                <div class="mt-1">Dunaújváros</div>
                            </div>
                            <div id="optionxs-3" class="col-12 uslugi-xs d-md-none uslugi-phone">
                                <img class="float-left phone" src="css/img/phone.png" width="50px" height="50px">
                                <div class="mt-1">Telefonos támogatás</div>
                            </div>
                        </div>
                    </div>      
                </div>
            </section>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js" integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ==" crossorigin="anonymous"></script>
<script src="script/app.js"></script>


<script>
  $(function(){
    $('#login-btn').click(function(){
      uni_modal("","login.php")
    })
    $('#navbarResponsive').on('show.bs.collapse', function () {
        $('#mainNav').addClass('navbar-shrink')
    })
    $('#navbarResponsive').on('hidden.bs.collapse', function () {
        if($('body').offset.top == 0)
          $('#mainNav').removeClass('navbar-shrink')
    })
  })

  $('#search-form').submit(function(e){
    e.preventDefault()
     var sTxt = $('[name="search"]').val()
     if(sTxt != '')
      location.href = './?p=products&search='+sTxt;
  })
</script>