<x-home-layout>
    <x-common.breadcrumb :title="'Add Payment'" :path="'Choos Package'"  :pathUrl="url('choos-package')" />
    <div class="container-fluid featured-category">
        <div class="container">
            <div class="row fcatrow auth-container pt-5 pb-5">
                <div class="col-lg-6 col-md-10 mx-auto shadow authcard">

                    @if(\Session::has('error'))
                        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                        {{ \Session::forget('error') }}
                    @endif
                    @if(\Session::has('success'))
                        <div class="alert alert-success">{{ \Session::get('success') }}</div>
                        {{ \Session::forget('success') }}
                    @endif
                    
                    <div class="row form-row">
                        <div class="col-md-4">
                            <label for="">Package Name</label>
                            <span class="spcol">:</span>
                        </div>
                        <div class="col-md-8">
                           <label for="">{{ $pack->name }}</label> 
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-4">
                            <label for="">Package Price</label>
                            <span class="spcol">:</span>
                        </div>
                        <div class="col-md-8">
                            <label for="">{{currency()}}{{ $pack->price }}</label> 
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-4">
                            <label for="">Package Validity</label>
                            <span class="spcol">:</span>
                        </div>
                        <div class="col-md-8">
                             <label for="">{{ $pack->validity }} Months</label> 
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-4">
                           
                        </div>
                        <div class="col-md-8">
                            <a href="{{ route('process-transaction') }}">
                                <button class="btn btn-primary">Make Payment</button>   
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-home-layout>