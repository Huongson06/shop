@extends('backend.layouts.master')
@section('content')
<div class="content">
    @include('backend.layouts.notification')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                      Tạo phiếu thu chi
                    </h2>
                   
    </div>
     <!-- BEGIN: Form Layout -->   
     <form method="post" action="{{route('freetransaction.update',$freetrans->id)}}">
            @csrf
            @method('patch')
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box p-5">
                    <div class="mt-3">
                       <label class="font-medium"> Nội dung </label>
                       <input class="form-control"  type ="text" name="content" value=" {{$freetrans->content}}"/> 
                    </div>
                    <div class="mt-3">
                       <label class="font-medium"> Số tiền: </label>
                       {{number_format($freetrans->total,0,",",".")}}
                    </div>
                    <div class="mt-3">
                       <label class="font-medium"> Loại </label>
                      {{$freetrans->operation == 1?"thu":"chi"}}
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box p-5">
                    <div class="mt-3">
                    <label class="font-medium"> Phân loại nội dung: </label>       
                    <select name="type_id" class="form-select mt-2 sm:mr-2"   >
                           @foreach ($typelist as $type)
                                <option value ="{{$type->id}}" {{$type->id == $freetrans->type_id?"selected":""}} >{{$type->title}}</option>
                           @endforeach    
                    </select>
                    
                
                    </div>
                 
                    <div class="mt-6">
                    <label class="font-medium"> Tài khoản: </label>       
                   {{\App\Models\Bankaccount::find($freetrans->bank_id)->title}}
                    
                
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="mt-3">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                            @foreach ($errors->all() as $error)
                                <li>    {{$error}} </li>
                            @endforeach
                    </ul>
                </div>
                @endif
            </div>
           
        </div> 
        <div>
                <button type="submit" class="btn btn-primary w-24">Lưu</button>
        </div>                  
    </form>          
</div>

@endsection
@section('scripts')
<script>
    
        document.getElementById("myform").addEventListener("submit", function(event) {
            // Get the input element
            let numberInput = document.getElementById("total");

            // Remove all commas before submission
            numberInput.value = numberInput.value.replace(/,/g, '');

            // The form will now submit the cleaned value without commas
        });
</script>

@endsection