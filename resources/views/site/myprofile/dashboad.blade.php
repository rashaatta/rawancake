<div class="tab-pane fade show active" id="dashboad">
    <div class="myaccount-content dashboad">
        <div class="alert alert-light">
              @langucw('your avaiable points') <b>{{getLogged()->totalPoints()}}</b>
              @langucw('profits') <b>{{getLogged()->convertPointstoMoney(getLogged()->totalPoints())}}</b>
        </div>
     <div class="alert alert-light">@langucw('referrals count') <b>{{getLogged()->usersIReferred()->count()}}</b></div>
 <div class="alert alert-light">@langucw('order count') <b>{{getLogged()->order->count()}}</b></div>
 <div class="alert alert-light">@langucw('user occasion count') <b>{{getLogged()->userOccasion()->count()}}</b></div>


    </div>

</div>
