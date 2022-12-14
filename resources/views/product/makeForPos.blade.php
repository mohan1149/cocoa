@extends('layouts.app')
@section('title', __('lang_v1.make_product_for_pos'))
@section('content')
    <section class="content-header">
        <h1>@lang('lang_v1.make_product_for_pos')</h1>
    </section>
    <section class="content">
        {!! Form::open([
            'url' => '/make-product-for-pos',
            'method' => 'POST',
            'id' => 'make_product_for_pos',
            'class' => 'make_product_for_pos',
            'files' => true,
        ]) !!}

        @component('components.widget', ['class' => 'box-primary'])
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        {!! Form::label('branch', __('lang_v1.branch') . ':*') !!}
                        {!! Form::select('branch', $branches, null, ['class' => 'form-control branch']) !!}
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        {!! Form::label('name', __('product.product_name') . ':*') !!}
                        {!! Form::select('products[]', [], null, ['class' => 'form-control products', 'multiple' => 'multiple']) !!}
                    </div>
                </div>
                <div class="col-12">
                    <table class="line_products table table-responsive table-stripped">

                    </table>
                </div>
                <div class="col-12">
                    <input type="submit" class="btn btn-primary" value="{{ __('lang_v1.make_available_for_pos') }}">
                </div>
            </div>
        @endcomponent
        {!! Form::close() !!}
    </section>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            let list = [];
            $('.branch').change((e) => {
                $.ajax({
                    url: '/branch-products/' + e.target.value,
                    success: function(result) {
                        list = result;
                        $('.products').empty();
                        let options = "<option>Choose</option>";
                        for (let index = 0; index < result.length; index++) {
                            options += "<option value='" + result[index].prd.id + "'>" + result[
                                index].prd.pname + "</option>";
                        }
                        $('.products').append(options);

                    },
                });
            });
            $('.products').select2();
            $('.products').change(e => {
                let prds = $('.products').val();
                $('.line_products').empty();
                for (let index = 0; index < prds.length; index++) {
                    let formgrp = "<tr>";
                    formgrp += "<td><h5>" + e.target.selectedOptions[index].innerText + "</h5>";
                    formgrp += "<ul>";
                    let combos = list.filter((item) => item.prd.id == prds[index]);
                    
                    for (let index = 0; index < combos[0].combos.length; index++) {
                        formgrp+="<li>"+combos[0].combos[index].name+" - "+combos[0].combos[index].qty_available+"</li>";  
                    }
                    formgrp += "</ul>";
                    formgrp += "</td>"
                    formgrp += "<td><input name='product_line_item_" + prds[index] +
                        "' class='form-control' type='text' placeholder='Quantity'></td>";
                    formgrp += "</tr>";
                    $('.line_products').append(formgrp);
                }
            })
        });
    </script>
@endsection
