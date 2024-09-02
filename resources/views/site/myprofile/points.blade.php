<div class="tab-pane fade" id="points">
    <div class="myaccount-content points">
        <div class="table-responsive">

            <div class="team-3-content">
                <div class="team-3-head">
                    <span class="team-3-name">{{getLogged()->totalPoints()}}  @langucw('your avaiable points')</span>
                    <span class="team-3-name">{{getLogged()->convertPointstoMoney(getLogged()->totalPoints())}}  @langucw('profits')</span>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
{{--                    <th>{{trans('general.id')}}</th>--}}
                    <th>@langucw('amount')</th>
                    <th>@langucw('balance')</th>
                    <th>@langucw('details')</th>
                    <th>@langucw('date')</th>


                </tr>
                </thead>
                <tbody>

                @foreach(getLogged()->points()->get() as $index=>$point)
                <tr>
{{--                    <td>{{ $index+1 }}</td>--}}
                    <td>{{ ($point->amount) }}</td>
                    <td>{{ ($point->balance) }}</td>
                    <td>{{$point->details}}</td>
                    <td>{{ $point->created_at->format('Y-m-d') }}</td>

                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
