<style>
    .tainer{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
        align-items: center;
        padding: 20PX
    }

    .img-crs{
        width: 20%;
        height: 20%;
        display: block
    }
</style>

<div class="flex justify-center items-center tainer">
    @foreach ($rooms as $item)
    <div class="flex card-dragon gap-2 border p-3 rounded-lg">
        <div class="images">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($item->images as $index => $image)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{asset('images/'.$image->image_url)}}" class="d-block w-20" alt="..." width="20" height="20">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card-content flex-col flex justify-center gap-3">
            <p>Nomor kamar : {{$item->room_number}} </p>
            <p>Tipe kamar : {{$item->roomType->type_name}}</p>
            <p>Status : {{ $item->availability_status ? 'Available' : 'Unavailable' }}</p>
            <a href="{{ route('user-booking', $item->id) }}" class="btn btn-primary mt-3">Pesan</a>
        </div>
    </div>
@endforeach


</div>
