@extends('backend.layouts.master')
@section('content')
<div class="content">
    @include('backend.layouts.notification')
   
                <div  class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                                    <button id="btnprint" class="btn btn-primary shadow-md mr-2">Print</button>
                                
                </div>
                </div>         
                <div id="divprint" class="intro-y box overflow-hidden mt-5 ">
                    <div class="intro-y box overflow-hidden mt-5">
                        <div class="flex flex-col lg:flex-row pt-10 px-5 sm:px-20 sm:pt-20 lg:pb-20 text-center sm:text-left">
                            <div class="font-semibold text-primary text-3xl">INVOICE</div>
                            <div class="mt-20 lg:mt-0 lg:ml-auto lg:text-right">
                                <div class="text-xl text-primary font-medium">Left4code</div>
                                <div class="mt-1">left4code@gmail.com</div>
                                <div class="mt-1">8023 Amerige Street Harriman, NY 10926.</div>
                            </div>
                        </div>
                        <div class="flex flex-col lg:flex-row border-b px-5 sm:px-20 pt-10 pb-10 sm:pb-20 text-center sm:text-left">
                            <div>
                                <div class="text-base text-slate-500">Client Details</div>
                                <div class="text-lg font-medium text-primary mt-2">Arnold Schwarzenegger</div>
                                <div class="mt-1">arnodlschwarzenegger@gmail.com</div>
                                <div class="mt-1">260 W. Storm Street New York, NY 10025.</div>
                            </div>
                            <div class="mt-10 lg:mt-0 lg:ml-auto lg:text-right">
                                <div class="text-base text-slate-500">Receipt</div>
                                <div class="text-lg text-primary font-medium mt-2">#1923195</div>
                                <div class="mt-1">Jan 02, 2021</div>
                            </div>
                        </div>
                        <div class="px-5 sm:px-16 py-10 sm:py-20">
                            <div class="overflow-x-auto">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-b-2 dark:border-darkmode-400 whitespace-nowrap">DESCRIPTION</th>
                                            <th class="border-b-2 dark:border-darkmode-400 text-right whitespace-nowrap">QTY</th>
                                            <th class="border-b-2 dark:border-darkmode-400 text-right whitespace-nowrap">PRICE</th>
                                            <th class="border-b-2 dark:border-darkmode-400 text-right whitespace-nowrap">SUBTOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border-b dark:border-darkmode-400">
                                                <div class="font-medium whitespace-nowrap">Midone HTML Admin Template</div>
                                                <div class="text-slate-500 text-sm mt-0.5 whitespace-nowrap">Regular License</div>
                                            </td>
                                            <td class="text-right border-b dark:border-darkmode-400 w-32">2</td>
                                            <td class="text-right border-b dark:border-darkmode-400 w-32">$25</td>
                                            <td class="text-right border-b dark:border-darkmode-400 w-32 font-medium">$50</td>
                                        </tr>
                                        <tr>
                                            <td class="border-b dark:border-darkmode-400">
                                                <div class="font-medium whitespace-nowrap">Vuejs Admin Template</div>
                                                <div class="text-slate-500 text-sm mt-0.5 whitespace-nowrap">Regular License</div>
                                            </td>
                                            <td class="text-right border-b dark:border-darkmode-400 w-32">1</td>
                                            <td class="text-right border-b dark:border-darkmode-400 w-32">$25</td>
                                            <td class="text-right border-b dark:border-darkmode-400 w-32 font-medium">$25</td>
                                        </tr>
                                        <tr>
                                            <td class="border-b dark:border-darkmode-400">
                                                <div class="font-medium whitespace-nowrap">React Admin Template</div>
                                                <div class="text-slate-500 text-sm mt-0.5 whitespace-nowrap">Regular License</div>
                                            </td>
                                            <td class="text-right border-b dark:border-darkmode-400 w-32">1</td>
                                            <td class="text-right border-b dark:border-darkmode-400 w-32">$25</td>
                                            <td class="text-right border-b dark:border-darkmode-400 w-32 font-medium">$25</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="font-medium whitespace-nowrap">Laravel Admin Template</div>
                                                <div class="text-slate-500 text-sm mt-0.5 whitespace-nowrap">Regular License</div>
                                            </td>
                                            <td class="text-right w-32">3</td>
                                            <td class="text-right w-32">$25</td>
                                            <td class="text-right w-32 font-medium">$75</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="px-5 sm:px-20 pb-10 sm:pb-20 flex flex-col-reverse sm:flex-row">
                            <div class="text-center sm:text-left mt-10 sm:mt-0">
                                <div class="text-base text-slate-500">Bank Transfer</div>
                                <div class="text-lg text-primary font-medium mt-2">Elon Musk</div>
                                <div class="mt-1">Bank Account : 098347234832</div>
                                <div class="mt-1">Code : LFT133243</div>
                            </div>
                            <div class="text-center sm:text-right sm:ml-auto">
                                <div class="text-base text-slate-500">Total Amount</div>
                                <div class="text-xl text-primary font-medium mt-2">$20.600.00</div>
                                <div class="mt-1">Taxes included</div>
                            </div>
                        </div>
                    </div>
                </div>
    
</div>

@endsection
@section('scripts')
<script>
    $("#btnprint").on("click", function(){
        var divToPrint=document.getElementById('divprint');
        // alert(divToPrint.innerHTML);
        var newWin=window.open('','Print-Window');
        newWin.document.open();
        newWin.document.write('<link rel="stylesheet" '
        + 'href="<?php echo asset('backend/assets/dist/css/app.css') ?>" '
        + 'type="text/css"><style type="text/css"> .content2 { padding: 0px 0px;  position: relative;   min-height: 100vh; min-width: 0px;flex: 1 1 0%;--tw-bg-opacity: 1;background-color: rgb(var(--color-slate-100) / var(--tw-bg-opacity)); padding-top: 0rem;padding-bottom: 0rem;}'
        + ' @media print {.modal-dialog { max-width: 2000px;} }</style> '
        + '<body onload="window.print()"><div style="min-height:50px !important; margin-left: 0px !important;  " class="content2">'+divToPrint.innerHTML+'</div></body>');
        newWin.document.close();
        setTimeout(function(){newWin.close();},20);
    });
</script>

@endsection