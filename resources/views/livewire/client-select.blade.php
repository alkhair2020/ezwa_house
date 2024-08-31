<div>
    <!-- حقل البحث -->
    <div class="col-sm-12 col-md-6">
    <input type="text" wire:model="search" placeholder="Search Clients">
    
    </div>
    <!-- قائمة العملاء -->
    <div class="col-sm-12 col-md-6">
    <select>
    <option value="vsvsd">{{$search}}</option>
        @foreach($clients as $client)
            <option value="{{ $client->id }}">{{ $client->id }}</option>
        @endforeach
    </select>
    </div>
    <!-- روابط التصفح (Pagination) -->
    <!-- {{ $clients->links() }} -->
</div>
