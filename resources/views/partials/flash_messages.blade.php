
@if(session('success_message'))
    <div class="alert alert-info my-3">{{session('success_message')}}</div>
@elseif(session('alert_message'))
    <div class="alert alert-danger my-3">{{session('alert_message')}}</div>
@endif

{{-- @if(session('cart_alert'))
    <div class="text-danger my-2"><strong>{{session('cart_alert')}}</strong></div>
@endif --}}
