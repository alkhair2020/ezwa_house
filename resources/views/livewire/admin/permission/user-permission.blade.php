
<div>
    @if($isCreate)
        @include('livewire.admin.leaves.create')
    @endif
    @if($isEdit)
        @include('livewire.admin.leaves.edit')
    @endif
    
    @include('livewire.admin.leaves.modal')
    @if($isList)
        <section id="multi-column">
            <div class="content-header row">
                @if(session()->has('message'))
                    @include('admin.includes.alerts.success')
                @endif
                @can('property-create')
                <div class="col-md-12 col-12">
                    <div class="dropdown float-md-right">
                        <!-- <a wire:click="create()"  class="btn btn-primary float-right mb-2">اضافة وحدة</a> -->
                        <button type="button" wire:click="create()" class="btn btn-primary btn-min-width  mb-1 float-right">اضافة وحدة</button>
                    </div>
                </div>
                @endcan
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">الاجازات</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div class="row">
                                    <div class="col-sm-12 col-md-8">
                                        <div class="d-flex">
                                            <div class="dataTables_length m-2" id="DataTables_Table_0_length">
                                                <label>عرض 
                                                    <select wire:model="data_length" class="form-control form-control-sm ">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                </label>
                                            </div>
                                            <div class="dataTables_length m-2" id="DataTables_Table_0_length">
                                                <label>الحالة 
                                                    <select wire:model="status_filter"  class="form-control form-control-sm">
                                                        <option value="" selected="" >اختر الحالة</option>
                                                        <option value="Pending" >في الانتظار</option>
                                                        <option value="Approved"  >موافقة </option>
                                                        <option value="Rejected"> رفض  </option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <div class="d-flex">
                                            
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter m-2">
                                                <label>بحث:<input type="search" class="form-control form-control-sm"  wire:model="search"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="DataTables_Table_0_length">
                                            <label>Show 
                                                <select wire:model="data_length" class="form-control form-control-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                            <label>Search:<input type="search" class="form-control form-control-sm"  wire:model="search"></label>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    
                                </div>
                                <table class="table table-striped table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>الموظف</th>
                                            <th>النوع</th>
                                            <th>البداية</th>
                                            <th>النهاية</th>
                                            <th>الحالة</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($leaves as $leave)
                                            <tr>
                                                <td>{{ $leave->users->name }}</td>
                                                <td>
                                                    @if($leave->type=='Sick')
                                                        مرضية 
                                                    @elseif($leave->type=='Annual')
                                                        سنوية
                                                    @elseif($leave->type=='Emergency') 
                                                        طارئة
                                                    @elseif($leave->type=='Unpaid')
                                                        غير مدفوعة
                                                    @endif    
                                                </td>
                                                <td>{{ $leave->start_date }}</td>
                                                <td>{{ $leave->end_date }}</td>
                                                <td>
                                                    @if($leave->status=='Pending')
                                                        في الانتظار
                                                    @elseif($leave->status=='Approved')
                                                        موافقة
                                                    @else
                                                        رفض
                                                    @endif
                                                </td>
                                                <td>
                                                    @can('property-edit')
                                                    <a class="btn btn-sm bg-success-light" wire:click="edit({{ $leave->id }})">
                                                        <button type="button" class="btn btn-icon btn-success mr-1"><i
                                                            class="la la-edit"></i></button>
                                                    </a>
                                                    @endcan
                                                    @can('property-delete')
                                                    <a data-toggle="modal" data-target="#delete">
                                                        <button type="button" class="btn btn-icon btn-danger mr-1" wire:click="gitIdForDelete({{ $leave->id }})"><i
                                                                class="la la-trash"></i></button>
                                                    </a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                                <div class="col-lg-12 col-md-12 pagination justify-content-center pagination-separate">
                                    {{ $leaves->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>



