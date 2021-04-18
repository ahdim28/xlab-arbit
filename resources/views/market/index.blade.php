@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title"><strong>INDODAX & HUOBI</strong></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table">
        <thead>
            <tr>
                <th style="width: 170px;">COINT</th>
                <th class="text-center" colspan="2">INDODAX</th>
                <th class="text-center" colspan="2">HUOBI</th>
                <th class="text-center">HUOBI > INDODAX</th>
                <th class="text-center">INDODAX > HUOBI</th>
            </tr>
            <tr>
                <th>LIST</th>
                <th class="text-center">BID</th>
                <th class="text-center">ASK</th>
                <th class="text-center">BID</th>
                <th class="text-center">ASK</th>
                <th class="text-center">PERCENT</th>
                <th class="text-center">PERCENT</th>
            </tr>
        </thead>
        <tbody id="coint-list">
            <tr>
                <td colspan="7" class="text-center">
                    <i class="fas fa-1x fa-sync-alt fa-spin"></i>
                    <strong>Please Waiting ...</strong>
                </td>
            </tr>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection

@section('jsbody')
<script>
   $(document).ready(function () {

    const interval = '{{ $config['interval'] }}';
    
    setInterval (function () {

        $.ajax({
                url : '/api/market/draw',
                type : "GET",
                dataType : "json",
                data : {},
                success : function(data) {

                    var listCoint = ``;
                    var huobi = data.huobi;

                    $('#coint-list').html(' ');
                    $.each(data.indodax.tickerAll ,function(index, value) {

                        var sH = value.sh;
                        const fee = (35*1/100);
                        const hti = (huobi.tickers[sH].bid_indodax - value.ask) / value.ask * 100 + (-fee);
                        const ith = (value.bid - huobi.tickers[sH].ask_indodax) / huobi.tickers[sH].ask_indodax * 100 + (-fee);
                        const formatter = new Intl.NumberFormat('en-US', {
                            minimumFractionDigits: 2,      
                            maximumFractionDigits: 2,
                        });

                        var colorH = 'red';
                        var iconH = 'fas fa-chevro-down';
                        if (hti > 0) {
                            colorH = 'green';
                            iconH = 'fas fa-chevro-up';
                        }
                        var colorI = 'red';
                        var iconI = 'fas fa-chevro-down';
                        if (ith > 0) {
                            colorI = 'green';
                            iconI = 'fas fa-chevro-up';
                        }

                        listCoint += `
                            <tr>
                                <td>
                                    <img src="`+value.logo_svg+`" style="width:30px;">
                                    `+value.coint+`
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-success">
                                    `+value.bid_rupiah+`
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-danger">
                                    `+value.ask_rupiah+`
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-success">
                                    `+huobi.tickers[sH].bid_rupiah+`
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-danger">
                                        `+huobi.tickers[sH].ask_rupiah+`
                                    </span>
                                </td>
                                <td class="text-center">
                                    <strong style="color: `+colorH+`;"><i class="`+iconH+`"></i> `+formatter.format(hti)+`%</strong>
                                </td>
                                <td class="text-center">
                                    <strong style="color: `+colorI+`;"><i class="`+iconI+`"></i> `+formatter.format(ith)+`%</strong>
                                </td>
                            </tr>
                        `;
                    });

                    $('#coint-list').append(listCoint);
                },
        });

    }, interval);
   });
</script>
@endsection