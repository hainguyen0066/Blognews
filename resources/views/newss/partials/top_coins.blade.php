@if($topCoins)
    <div>
        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">TOP COINS</div>
    </div>
    <div class="clearfix"></div>
    <div class="fh5co_tags_all">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Giá trị biến động</th>
                </tr>
            </thead>
            <tbody>
            @foreach($topCoins as $coin)
            <tr>
                <td>{{ $coin['name'] }}</td>
                <td>{{ round($coin['price'], 3) }}</td>
                <td>{{ round($coin['percent_change_24h'], 3) }}%</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <style>
        thead {
            background-color: #d0d2d0;
        }
    </style>
@endif
