<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">


<div class="card p-2 my-4">
    <h5 class="mb-3">Filters:</h5>
    <div class="row">

        <div class="col-md-3">
            <form action="store" method="get">
                <div class="input-group">
                    <div class="input-group-prepend">
                        
                            <select name="category" class="form-control" id="category">
                                <option value="0">Select Category</option>
                                <option>Cookware</option>
                                <option>Appliances</option>
                                <option>Knife Sets</option>
                                <option>Kitchen Tools</option>
                            </select>
                         
                    </div>
                    <button class="btn btn-default"> <span class="material-icons">done</span> </button>
                </div>
            </form>
        </div>

        <div class="col-md-3">
            <form action="store" method="get">
                <div class="input-group">
                    <div class="input-group-prepend">
                        
                            <select name="min_price" class="form-control" id="min_price">
                                <option value="0">Select Min Price</option>
                                <option value="200">lower than $200</option>
                                <option value="500">lower than $500</option>
                                <option value="800">lower than $800</option>
                                <option value="1000">lower than $1000</option>
                            </select>
                         
                    </div>
                    <button class="btn btn-default"> <span class="material-icons">done</span> </button>
                </div>
            </form>
        </div>

        <div class="col-md-3">
            <form action="store" method="get">
                <div class="input-group">
                    <div class="input-group-prepend">
                        
                            <select name="max_price" class="form-control" id="max_price">
                                <option value="0">Select Max Price</option>
                                <option value="200">higher than $200</option>
                                <option value="500">higher than $500</option>
                                <option value="800">higher than $800</option>
                                <option value="1000">higher than $1000</option>
                            </select>
                         
                    </div>
                    <button class="btn btn-default"> <span class="material-icons">done</span> </button>
                </div>
            </form>
        </div>

        <div class="col-md-3">
            <form action="store" method="get">
                <div class="input-group">
                    <div class="input-group-prepend">
                        
                            <input type="text" placeholder="search" name="search" class="form-control" id="search">
                            <button class="btn btn-default"> 
                                <span class="material-icons">search</span> 
                            </button>
                         
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>