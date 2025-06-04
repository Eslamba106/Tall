
    <table class="table table-flush" id="products-list-{{$rannd}}">
    <thead class="thead-light">
    <tr>
    <th>اسم العميل</th>
    <th>المرحلة</th>
    <th>المدينة</th>
    <th>تاريخ الاجراء</th>
    <th>الاجرائات</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($deals as $key => $deal)
      @php
        $user = App\Models\Customer::find($deal->user);
      @endphp
      <tr>
          <td>
            {{$user->name}}
            </td>  
            <td>
              @php
          $content = 'صفقة جديدة';
        if ($deal->status == 2) {
            $content = 'زيارة العقار';
        }elseif ($deal->status == 3) {
            $content = 'المفاوضات';
        }elseif ($deal->status == 4) {
            $content = 'تمت الصفقة';
        }elseif ($deal->status == 5) {
            $content = 'خسارة الصفقة';
        }
              @endphp
             <span class="status-main"> {{$content}}</span>
              </td>    
              <td>
                {{$deal->city}}
            </td>  
          <td>
            <h6 class="mr-2 ms-3 my-auto">{{ date('d-m-Y', strtotime($deal->created_at)) }}</h6>
        </td>
        <td>
         <a href="{{route('deals.edit',$deal->id)}}" class="editer">تعديل</a>
      </td>  
        </tr>
        @endforeach
    </tbody>
    </table>
<script>
    if (document.getElementById('products-list-{{$rannd}}')) {
      const dataTableSearch = new simpleDatatables.DataTable("#products-list-{{$rannd}}", {
        searchable: false,
        fixedHeight: false,
        paging: false,
        perPage: 10
      });
    };
  </script>