@php
 $mainCategories=app()->make(\App\Repositories\MainCategoriesRepository::class)->get();
@endphp

<div class="accordion" id="accordionPanelsStayOpenExample">
    @foreach($mainCategories as $category)
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-heading{{$category->id}}">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{$category->id}}" aria-expanded="false" aria-controls="panelsStayOpen-collapse{{$category->id}}">
                {{$category->getName()}}
            </button>
        </h2>
        <div id="panelsStayOpen-collapse{{$category->id}}" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-heading{{$category->id}}">
            <div class="accordion-body">
            <ul>
            @foreach($category->subCategory() as $cat)
                <li  ><a class="sub-item-link "  ><span class="filter-form" main_category="{{$category->id??null}}" sub_category="{{$cat->id??''}}">{{$cat->getName()}}</span></a></li>
            @endforeach
            </ul>
            </div>
        </div>
    </div>
    @endforeach
</div>


