@extends('admin.admin_layouts')

@section('admin_content')

<div class="sl-mainpanel">

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Subcriber List</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Subcriber List
        <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">
          All Delete
        </a>
      </h6>

      <div class="table-wrapper">  
        <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
              <th class="wd-15p">ID</th>
              <th class="wd-15p">Email</th>
              <th class="wd-15p">Subcribing Time</th>
              <th class="wd-20p">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($sub as $key=>$row)
            <tr>
              <td> <input type="checkbox"> {{ $key + 1 }}</td>
              <td>{{ $row->email }}</td>
              <td>{{ \Carbon\Carbon::parse($row->created_at)->diffForhumans() }}</td>
              <td>
                <a href="{{ URL::to('delete/sub/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
              </td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->

</div><!-- sl-mainpanel -->



<!-- LARGE MODAL -->
<div id="modaldemo3" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Brand Add</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20">

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form method="post" action="{{ route('store.brand') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Brand Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="brand" name="brand_name">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Brand Logo</label>
            <input type="file" class="form-control"  aria-describedby="emailHelp" placeholder="brand logo" name="brand_logo">
          </div>
          

          <!-- modal-body -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-info pd-x-20">Submit</button>
            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->

@endsection