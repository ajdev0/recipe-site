@if (session()->has('rong'))
          <div class="alert alert-danger" role="alert">
              {{ session()->get('rong') }}
          </div>
@endif
