<div class="header-bottom">
    <div class="container">
        <div class="header">
            <div class="col-md-9 header-left">
                <div class="top-nav">
                    <ul class="memenu skyblue">
                        <li class="active"><a href="{{BASE_URL}}">Home</a></li>
                        <li ><a href="{{BASE_URL . 'product'}}">All</a></li>
                        @foreach($categories as $cate)
                        <li class="grid"><a href="{{BASE_URL . 'category/' . $cate->id}}">{{$cate->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-3 header-right">
                <div class="search-bar">
                    <form action="{{BASE_URL . 'search'}}" method="POST">
                        <input type="text" name="keyword" value="{{isset($keyword) ? $keyword : 'Search'}}" onfocus="this.value = '';"
                            onblur="if (this.value == '') {this.value = 'Search';}">
                        <input type="submit" value="">
                    </form>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>