 <nav class="navbar bg-light">
     <div class="container-fluid">
         <h1 class="navbar-brand">Add New Product</h1>
         <div id='nav-buttons' class="#">
             <button name='submit' id="submit" type="submit" form='product_form'
                 class="btn btn-primary btn-lg">SAVE</button>
             <a href="/">
                 <button type='button' class="btn btn-danger btn-lg">CANCEL</button>
             </a>
         </div>
     </div>
 </nav>
 <hr class="mx-4 py-3">
 <main>
     <div class="container-fluid">
         <div class="row">
             <section class="vh-90">
                 <div class=" mask d-flex align-items-center h-90 gradient-custom-3">
                     <div class="container h-100">
                         <div class="row d-flex justify-content-center align-items-center h-80">
                             <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                 <div class="card" style="border-radius: 15px;">
                                     <div class="card-body p-5">
                                         <form method="POST" id="product_form" class="needs-validation" novalidate>
                                             <div class="form-outline mb-4">
                                                 <label for="sku"
                                                     class="col-sm-2 col-form-label"><strong>SKU</strong></label>
                                                 <div class="col-sm-auto">
                                                     <input required type="text" class="form-control" id="sku"
                                                         value="<?= $product->data['sku'] ?? '' ?>" name="sku"
                                                         placeholder="e.g sku56565">
                                                     <div id="skuValidator" class="text-dark position-absolute d-none"
                                                         role="status">
                                                         <span class="visually-hidden">Loading...</span>
                                                     </div>
                                                     <div class="invalid-feedback" id="skuFeedback">
                                                         The sku field is required.
                                                     </div>
                                                 </div>
                                             </div>

                                             <div class="form-outline mb-4">
                                                 <label for="name"
                                                     class="col-sm-2 col-form-label"><strong>Name</strong></label>
                                                 <div class="col-sm-auto">
                                                     <input required type="text" class="form-control" id="name"
                                                         value="<?= $product->data['name'] ?? '' ?>" name="name"
                                                         placeholder="e.g Book ,Table, DVD">
                                                     <div class="invalid-feedback">
                                                         The name field is required.
                                                     </div>
                                                 </div>

                                             </div>

                                             <div class="form-outline mb-4">
                                                 <label for="name" class="col-sm-2 col-form-label"><strong>Price <i>
                                                             ($)</i> </strong></label>
                                                 <div class="col-sm-auto">
                                                     <input required type="number" class="form-control" id="price"
                                                         value="<?= $product->data['price'] ?? '' ?>" name="price"
                                                         placeholder="$ 45, $ 2, $ 699 . . .">
                                                     <div class="invalid-feedback">
                                                         The price field is required.
                                                     </div>
                                                 </div>

                                             </div>

                                             <div class="form-outline mb-4">
                                                 <label for="name" class="col-sm-2 col-form-label">
                                                       </label>
                                                 <div class="col-sm-auto">
                                                     <select required class="form-select" id="productType"
                                                         name="type">
                                                         <option value="">Product TypeSwitcher . . .</option>
                                                         <?php foreach ($product::$validTypes ?? '' as $value) : ?>
                                                         <option <?php if (($product->data['type'] ?? '') === $value); ?> value="<?= $value ?>">
                                                             <?= $value ?></option>
                                                         <?php endforeach ?>
                                                     </select>
                                                     <div class="invalid-feedback">
                                                         The type field is required.
                                                     </div>
                                                 </div>
                                             </div>
                                             </fieldset>

                                             <!--product types-->
                                             <div id="productDescription" class="mb-5">
                                                 <fieldset class="d-none" id="dvdDescription">
                                                     <div><i>Please Provide Size</i></div>
                                                     <br>
                                                     <div class="form-outline mb-4">
                                                         <label for="size" class="col-sm-2 col-form-label">
                                                             <strong>Size</strong> <i> (MB)</i></label>
                                                         <div class="col-sm-auto">
                                                             <input type="number" class="form-control" id="size"
                                                                 min="1" step="1" name="size"
                                                                 value="<?= $product->data['size'] ?? '' ?>">
                                                             <div class="invalid-feedback">
                                                                 The size field is required.
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </fieldset>

                                                 <fieldset class="d-none" id="bookDescription">
                                                     <div><i>Please Provide Weight</i></div>
                                                     <br>
                                                     <div class="form-outline mb-4">
                                                         <label for="weight" class="col-sm-2 col-form-label">
                                                             <strong>Weight</strong> <i> (KG)</i>
                                                         </label>
                                                         <div class="col-sm-auto">
                                                             <input type="number" class="form-control" id="weight"
                                                                 min="1" step="1" name="weight"
                                                                 value="<?= $product->data['weight'] ?? '' ?>">
                                                             <div class="invalid-feedback">
                                                                 The weight field is required.
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </fieldset>

                                                 <fieldset class="d-none" id="furnitureDescription">
                                                     <div><i>Please Provide Dimensions in HxWxL</i></div>
                                                     <br>
                                                     <div class="form-outline mb-4">
                                                         <label for="height" class="col-sm-2 col-form-label">
                                                             <strong>Height</strong> <i> (CM)</i></label>
                                                         <div class="col-sm-auto">
                                                             <input type="number" class="form-control"
                                                                 id="height" min="1" step="1"
                                                                 name="height"
                                                                 value="<?= $product->data['height'] ?? '' ?>">
                                                             <div class="invalid-feedback">
                                                                 The height field is required.
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="form-outline mb-4">
                                                         <label for="width" class="col-sm-2 col-form-label">
                                                             <strong>Width</strong> <i> (CM)</i></label>
                                                         <div class="col-sm-auto">
                                                             <input type="number" class="form-control"
                                                                 id="width" min="1" step="1"
                                                                 name="width"
                                                                 value="<?= $product->data['width'] ?? '' ?>">
                                                             <div class="invalid-feedback">
                                                                 The width field is required.
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="form-outline mb-4">
                                                         <label for="length" class="col-sm-2 col-form-label">
                                                             <strong>Length</strong> <i> (CM)</i></label>
                                                         <div class="col-sm-auto">
                                                             <input type="number" class="form-control"
                                                                 id="length" min="1" step="1"
                                                                 name="length"
                                                                 value="<?= $product->data['length'] ?? '' ?>">
                                                             <div class="invalid-feedback">
                                                                 The length field is required.
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </fieldset>
                                             </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </section>
         </div>
     </div>

 </main>
