@extends('panel.layout.main')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-1">
                        <i class="pe-7s-cash"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text">$<span class="count">23569</span></div>
                            <div class="stat-heading">Revenue</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-2">
                        <i class="pe-7s-cart"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span class="count">3435</span></div>
                            <div class="stat-heading">Sales</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-3">
                        <i class="pe-7s-browser"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span class="count">349</span></div>
                            <div class="stat-heading">Templates</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-4">
                        <i class="pe-7s-users"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span class="count">2986</span></div>
                            <div class="stat-heading">Clients</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="orders">
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Orders </h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="serial">1.</td>
                                    <td> #5469 </td>
                                    <td>  <span class="name">Louis Stanley</span> </td>
                                    <td> <span class="product">iMax</span> </td>
                                    <td><span class="count">231</span></td>
                                    <td>
                                        <span class="badge badge-complete">Complete</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="serial">2.</td>
                                    <td> #5468 </td>
                                    <td>  <span class="name">Gregory Dixon</span> </td>
                                    <td> <span class="product">iPad</span> </td>
                                    <td><span class="count">250</span></td>
                                    <td>
                                        <span class="badge badge-complete">Complete</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="serial">3.</td>
                                    <td> #5467 </td>
                                    <td>  <span class="name">Catherine Dixon</span> </td>
                                    <td> <span class="product">SSD</span> </td>
                                    <td><span class="count">250</span></td>
                                    <td>
                                        <span class="badge badge-complete">Complete</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="serial">4.</td>
                                    <td> #5466 </td>
                                    <td>  <span class="name">Mary Silva</span> </td>
                                    <td> <span class="product">Magic Mouse</span> </td>
                                    <td><span class="count">250</span></td>
                                    <td>
                                        <span class="badge badge-pending">Pending</span>
                                    </td>
                                </tr>
                                <tr class=" pb-0">
                                    <td class="serial">5.</td>
                                    <td> #5465 </td>
                                    <td>  <span class="name">Johnny Stephens</span> </td>
                                    <td> <span class="product">Monitor</span> </td>
                                    <td><span class="count">250</span></td>
                                    <td>
                                        <span class="badge badge-complete">Complete</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                </div>
            </div> <!-- /.card -->
        </div>  <!-- /.col-lg-8 -->

        <div class="col-xl-4">
            <div class="row">
                <div class="col-lg-6 col-xl-12">
                    <div class="card br-0">
                        <div class="card-body">
                            <div class="chart-container ov-h">
                                <div id="flotPie1" class="float-chart"></div>
                            </div>
                        </div>
                    </div><!-- /.card -->
                </div>

                <div class="col-lg-6 col-xl-12">
                    <div class="card bg-flat-color-3  ">
                        <div class="card-body">
                            <h4 class="card-title m-0  white-color ">August 2018</h4>
                        </div>
                            <div class="card-body">
                                <div id="flotLine5" class="flot-line"></div>
                            </div>
                    </div>
                </div>
            </div>
        </div> <!-- /.col-md-4 -->
    </div>
</div>
                <!-- /.orders -->
@endsection