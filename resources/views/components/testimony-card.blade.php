<div class="card" style="min-width: 16rem;">
    <div class="card-body">
      <h4 class="card-title">{{$user}}</h4>
      <h6 class="card-subtitle text-muted mb-3">{{number_format($rating,2)}}/5.00</h6>
      <p class="card-text">{{strip_tags($text)}}</p>
    </div>
</div>
