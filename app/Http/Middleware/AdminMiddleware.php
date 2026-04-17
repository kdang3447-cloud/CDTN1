public function handle($request, Closure $next)
{
if (auth()->check() && auth()->user()->role === 'admin') {
return $next($request);
}

return redirect('/home')->with('error', 'Bạn không có quyền truy cập');
}