<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Web-Based Misinformation Detection Algorithm in Social Media Platforms</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
            
         <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body >
        <section style="text-align: center; margin-top: 100px">
            
                <h2 style="">Web-Based Misinformation Detection Algorithm in Social Media Platforms</h2>
        </section>

        <section class="px-5">
             <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Type URL</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Type Text/Article/News</button>
               
              </div>
            </nav>

             <div class="tab-content" id="nav-tabContent">

              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  <!-- URL -->
                   <div class=" mt-3" style="text-align: center;">
                
                        <input class="form-control me-2" type="search" placeholder="Search" id="searchData" aria-label="Search">
                        <button class="btn btn-outline-primary mt-3 btnSearch" data-cat="url">Search</button>
                        
                    </div>
                  <!-- END URL -->
              </div>


              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <!-- TEXT -->
                    <div class=" mt-3" style="text-align: center;">
                        <textarea class="form-control me-2" id="searchData2"></textarea>
                        
                        <button class="btn btn-outline-primary mt-3 btnSearch" data-cat="text">Search</button>
                        
                    </div>
                <!-- END TEXT -->
              </div>

            </div>
        </section>
       
        <section style="text-align: center;margin-top: 50px">
           
        </section>
        <section  class="mt-4 div-result" style="text-align: center; display: none;">
            <div class="container pt-4 pb-2" style="min-width: 600px; background-color: #c9c9be; border-radius: 15px">
                <h5 style="text-align: left;">Text</h5>
                <p>Sample Text</p>
            </div>
            
        </section>

        <section class="mt-3 pb-5 div-result" style="text-align: center; display: none;" >
            <div class="container" style="width: 600px; ">
                <h5>Result:</h5>
                <table style="width: 100%">
                    <thead>
                        
                    
                        <tr>
                            <th>Url</th>
                            <th>Analysis</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>https://sample.com/</td>
                            <td><span class="badge bg-danger"> Misinformation</span></td>
                            <td><span class="badge bg-primary"> Report</span></td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
            
        </section>
    <script src="/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <script>
    (function(){
        $('.btnSearch').click(function(e){
            e.preventDefault();
            const proxyUrl = 'https://cors-anywhere.herokuapp.com/';

            const targetUrl = $('#searchData').val();
            console.log(targetUrl);
            fetch(proxyUrl + targetUrl)
                .then(response => response.text())
                .then(data => {
                    console.log(data); // Do something with the fetched data
                })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
            
            $('.div-result').show();
        });
    })();
    </script>
    </body>
</html>
