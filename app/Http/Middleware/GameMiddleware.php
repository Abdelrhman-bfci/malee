<?php

namespace App\Http\Middleware;

use Closure;

class GameMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $header = $request->header('Authorization');
        if($header == 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNjU1N2JlZjA3NzA3MTg3NzEyOWM5YWJmYzg3M2YxMmE0YTVjZDVkYTBmZDE1MWE0YjllMTI2ODBkZWQ0NjMzYWExMGY0Mzg1M2UxOWFmNjUiLCJpYXQiOjE2MTAzODU1NDksIm5iZiI6MTYxMDM4NTU0OSwiZXhwIjoxNjQxOTIxNTQ5LCJzdWIiOiI1NjExNSIsInNjb3BlcyI6W119.g1w4VhUt4xevM8zYOSeYLctqPk0uyIhu_h0DmRPTalt7Qvl04HcF3-hxwY-vcQyar-RzViZh9nksydpxuafYM5p33NssxTILHfD4Gsfc0Y330vvSf2iWyMIsEP8w9d8J_kQHcmt8lJ7_A6eJtzWmdsbkFc-FvX4l7cZJyV8RuOnVEuCcgmpOs7GntNGFpo9Vajjx_sNhBp2iFvzNAcXhIUXSs71FoIRgEj4DS_RdVdvxyL0ROy4xDmgqdUFatQcXKQ0jQCK9Kd6Tsfbn4CjwETsQyHp6YM1fB2eVlE79vozKxipB6JgjbMsYxf2-98JakfqvPHVhBS1W35sV9sTHWCMV683cX6PUUKPGxR82L7CtMdy4ERp5dOQa9HIz0aVmIBjf7Dsj5wHW21XNSP6kKcsHlSbjvyO1FX0y9-BsBRj_3RPxe1mRnH2XjF-_fvsQnO5-F_UPbJiEFz2PGjO2jmmdfDzYgkF3Fznu0GIbM9Q2ZdK1IPrZzoJmyaD5OBU0dYIwpP8wNLk3brVcZFiUveGw0hQqZbW_Q7Tp-3ddklq0Jfz5jOJbf5-_e-TF3Du0rzNaOzsQVqibzOMlTHSuLNpkrpnQBOCFZGHQieGzrLSNAu-3PyiYgfftVoAUnuL2Dgi9K6lX-99Wo76q9ciBgnDaUCTHO1itTUcq4cuMZoA'){
            return $next($request);
        }
        return  response()->json(['error' => 'invalid Key']);
    }
}
