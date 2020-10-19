<!-- searchbox -->
<div class="container-fluid searchbox px-md-5 mt-2">
    <div class="row">
        <div class="col-md-12">
            <form action="" method="POST">
                @csrf
                <div class="form-row d-flex justify-content-center">
                    <div class="input-box mr-2">
                        <label><span class="text-dark font-weight-bold">USE</span></label>
                        <input type="text" class="find" id="find1" placeholder="Search Cryptocurrency">
                    </div>
                    <div class="input-box mr-2">
                        <label><span class="text-dark font-weight-bold">IN</span></label>
                        <input type="text" class="find" id="find2" placeholder="Search Country">
                    </div>
                    <div class="input-box">
                        <label><span class="text-dark font-weight-bold">WITH</span></label>
                        <input type="text" class="find" id="find3" placeholder="Search Card Method">
                        <button type="submit" class="btn search-icon"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
 <!-- end of searchbox -->