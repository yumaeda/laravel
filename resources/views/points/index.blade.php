@extends('layouts.base')

@section('title', __('matsune.point_title'))

@section('content')
@if (session('transactions'))
<h3>{{ __('matsune.donate_point') }}</h3>
<table class="transaction_summary">
    <tbody>
        @foreach (session('transactions') as $transaction)
        <tr>
            <td>{{ __('matsune.recipient') }}:</td>
            <td>{{ $transaction['user_name'] }}</td>
        </tr>
        <tr>
            <td>{{ __('matsune.donated_point') }}:</td>
            <td>{{ $transaction['point'] }}&nbsp;pt</td>
        </tr>
        @endforeach
    </tbody>
</table>
<input type="button" value="{{ __('matsune.back') }}" class="footer_button" onclick="location.href='/profiles/';">
@else
<form action="{{ route('donate') }}" method="POST">
    {{ csrf_field() }}
    <div class="point_donation_body">
        <span>&gt;&gt;&nbsp;</span>
        @include('inc.user_selector', [ 'users' => $users ])
        &nbsp;&nbsp;
        <input type="number" value="0" class="point_fld" min="1" max="{{ auth()->user()->point }}" name="point">&nbsp;pt
        <div class="comment_pane">
            <textarea class="comment_fld" rows="5" placeholder="{{ __('matsune.comment_placeholder') }}" name="comment"></textarea>
        </div>
        <div class="error_pane">
        @if ($errors->any())
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif
        </div>
        <input type="submit" value="{{ __('matsune.donate_point') }}" class="footer_button">
        <input type="button" value="{{ __('matsune.back') }}" class="footer_button" onclick="location.href='/profiles/';">
    </div>
</form>
@endif
@endsection

@section('bottom-script')
<script type="text/javascript">

$(document).ready(function() {  
    $('.user_dropdown').append('<div class="button"></div>');    
    $('.user_dropdown').append('<ul class="select_list"></ul>');    
    $('.user_dropdown select option').each(function() {  
        var bg        = $(this).css('background-image'),
            list_html =
                '<li class="clsAnchor">' +
                    '<span value="' + $(this).val() + '" class="' + $(this).attr('class') + '" style=background-image:' + bg + '>' +
                        $(this).text() +
                    '</span>' +
                '</li>';

            $('.select_list').append(list_html);
    });    

    var button_html =
        '<span style=background-image:' + $('.user_dropdown select').find(':selected').css('background-image') + '>' +
            $('.user_dropdown select').find(':selected').text() +
        '</span>' +
        '<a href="javascript:void(0);" class="select_list-link">&#x25BC;</a>';

    $('.user_dropdown .button').html(button_html);
    $('.user_dropdown ul li').each(function() {   
        if ($(this).find('span').text() == $('.user_dropdown select').find(':selected').text()) {  
            $(this).addClass('active');       
        }      
    });     

    $('.user_dropdown .select_list span').on('click', function() {          
        var dd_text = $(this).text(),
            dd_img  = $(this).css('background-image'),
            dd_val  = $(this).attr('value'),
            html    = '<span style=background-image:' + dd_img + '>' + dd_text + '</span>' +
                      '<a href="javascript:void(0);" class="select_list-link">&#x25BC;</a>';

        $('.user_dropdown .button').html(html);
        $('.user_dropdown .select_list span').parent().removeClass('active');    
        $(this).parent().addClass('active');     
        $('.user_dropdown select[name=user_id]').val(dd_val); 
        $('.user_dropdown .select_list li').slideUp();     
    });       

    $('.user_dropdown').on('click','.button', function() {      
        $('.user_dropdown ul li').slideToggle();  
    });     
});

</script>
@endsection
