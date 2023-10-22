<!DOCTYPE html>
<html lang="en">
<head>
    <x-header-component/>
</head>
<body>
    <x-navigation-component/>
     <div class="container-fluid my-5">
        <div class="row">
            <div class="col-md-12">
                <p class="text-primary text-center">
                     @auth
                     Welcome, {{ auth()->user()->name}}  <br>
                     Your Email address is {{ auth()->user()->email }}
                     @else
                      Hello Guest, Welcome to our website   
                     @endauth
                </p>
            </div>
        </div>
       <div class="row">
         <div class="col-md-12">
            <h4 class="text-center text-primary">Software Related Questions From External Api</h4>
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>Questions</th>
                        <th>Answer A</th>
                        <th>Answer B</th>
                        <th>Answer C</th>
                        <th>Answer D</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $question)
                        <tr>
                            <td>{{ $question->question }}</td>
                            <td>{{ $question->answers->answer_a }}</td>
                            <td>{{ $question->answers->answer_b }}</td>
                            <td>{{ $question->answers->answer_c }}</td>
                            <td>{{ $question->answers->answer_d }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
         </div>
       </div>
     </div>
    <x-footer-component/>
</body>
</html>
