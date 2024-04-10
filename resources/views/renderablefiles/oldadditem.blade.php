<div class="v-blocks">
    <div class="row product-item-row">
        <div class="col-12 col-md-2 col-sm-12">
            <div class="input-group">
                <div class="input-group-append">
                    <label class="input-group-text font-weight-bold" for="inputGroupSelect02">Item</label>
                    <input type="text" value="{{ $id }}" name="id[]" readonly
                        class="form-control item-number">
                </div>
            </div>
        </div>
        <!-- end: H (in) -->

        <div class="col-12 col-md-10 col-sm-12">
            <div class="input-group">
                <div class="input-group-append">
                    <label class="input-group-text font-weight-bold"
                        for="inputGroupSelect03{{ $renderCount }}">Product</label>
                </div>
                <select name="product[]" class="custom-select product_select" id="inputGroupSelect03{{ $renderCount }}"
                    onchange="getSelectedProductDynamic('{{ $renderCount }}')" required>
                    <option selected="" disabled>Select</option>

                    @forelse ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @empty
                        <option disabled>No Products</option>
                    @endforelse

                </select>
            </div>
        </div>
        <!-- end: Product Select -->
        <div class="col-12">
            <div id="productShow{{ $renderCount }}" class="input-group selected-product-show" hidden>
                <div class="product-input-label">
                    <label for="productShow{{ $renderCount }}" class="input-group-text">
                        <p id="selectedProduct{{ $renderCount }}">Select</p>
                        <span data-bs-toggle="modal" data-bs-target="#selectedProductModal{{ $renderCount }}"> (Show)
                        </span>
                    </label>
                </div>
            </div>

            <div class="modal fade frontnotch_modal" id="selectedProductModal{{ $renderCount }}" tabindex="-1"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="/images/no-image.jpg" class="w-100" alt="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end: Show Selected Product Button --}}

        <div class="col-12 col-md-3 col-sm-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bold" id="idwidth">H (<span
                            class="__type">in</span>)</span>
                </div>
                <input name="height[]" type="number" min="0" class="form-control" step=".01" required>
                <div id="extraHeightOption" class="width_frac">
                    <select name="height_in[]" class="custom-select" id="__heightIn" required>
                        <option value="0" selected="">0</option>
                        <option value="0.062">1/16"</option>
                        <option value="0.125">1/8"</option>
                        <option value="0.187">3/16"</option>
                        <option value="0.25">1/4"</option>
                        <option value="0.312">5/16"</option>
                        <option value="0.375">3/8"</option>
                        <option value="0.437">7/16"</option>
                        <option value="0.5">1/2"</option>
                        <option value="0.562">9/16"</option>
                        <option value="0.625">5/8</option>
                        <option value="0.687">11/16"</option>
                        <option value="0.75">3/4"</option>
                        <option value="0.812">13/16"</option>
                        <option value="0.875">7/8"</option>
                        <option value="0.937">15/16"</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- end: H (in) -->

        <div class="col-12 col-md-3 col-sm-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bold" id="idwidth">W (<span
                            class="__type">in</span>)</span>
                </div>
                <input name="width[]" type="number" min="0" class="form-control" step=".01" required>
                <div id="extraWidthOption" class="width_frac">
                    <select name="width_in[]" class="custom-select" id="__widthIn" required>
                        <option value="0" selected="">0</option>
                        <option value="0.062">1/16"</option>
                        <option value="0.125">1/8"</option>
                        <option value="0.187">3/16"</option>
                        <option value="0.25">1/4"</option>
                        <option value="0.312">5/16"</option>
                        <option value="0.375">3/8"</option>
                        <option value="0.437">7/16"</option>
                        <option value="0.5">1/2"</option>
                        <option value="0.562">9/16"</option>
                        <option value="0.625">5/8</option>
                        <option value="0.687">11/16"</option>
                        <option value="0.75">3/4"</option>
                        <option value="0.812">13/16"</option>
                        <option value="0.875">7/8"</option>
                        <option value="0.937">15/16"</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- end: W (in) -->

        <div class="col-12 col-md-3 col-sm-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bold" id="idwidth">D
                        (<span class="__type">in</span>)</span>
                </div>
                <input name="depth[]" type="number" min="0" class="form-control" step=".01" required>
                <div id="extraDepthOption" class="width_frac">
                    <select name="depth_in[]" class="custom-select" id="__depthIn" required>
                        <option value="0" selected="">0</option>
                        <option value="0.062">1/16"</option>
                        <option value="0.125">1/8"</option>
                        <option value="0.187">3/16"</option>
                        <option value="0.25">1/4"</option>
                        <option value="0.312">5/16"</option>
                        <option value="0.375">3/8"</option>
                        <option value="0.437">7/16"</option>
                        <option value="0.5">1/2"</option>
                        <option value="0.562">9/16"</option>
                        <option value="0.625">5/8</option>
                        <option value="0.687">11/16"</option>
                        <option value="0.75">3/4"</option>
                        <option value="0.812">13/16"</option>
                        <option value="0.875">7/8"</option>
                        <option value="0.937">15/16"</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- end: D (in) -->

        <div class="col-12 col-md-2 col-sm-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bold" id="basic-addon1">Qty</span>
                </div>
                <input name="quantity[]" type="number" value="1" step="1" class="form-control"
                    min="1" required>
            </div>
        </div>
        <!-- end: Qty -->

        <div class="col-12 col-md-8 col-sm-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text items_notes_text">Notes <br> (Optional)</span>
                </div>
                <textarea name="note[]" class="form-control items_notes" rows="4" aria-label="With textarea"
                    spellcheck="false"></textarea>
            </div>
        </div>
        <!-- end: Notes -->
        <div class="col-12 col-md-4 col-sm-12">
            <div class="upload_design">
                <input type="file[]" id="actual-btn" hidden />
                <label for="actual-btn">
                    <span id="file-chosen" for="actual-btn">
                        Upload Design
                        <br />
                        (pdf, jpg, png, CAD)
                    </span>
                    <span id="chosen-btn">
                        Choose File
                    </span>
                </label>
            </div>
            <!--  end: upload_design-->
        </div>
        <!-- end:Upload Design -->
        {{-- <div class="bdr"></div> --}}
        <div class="col-12 col-md-4 col-sm-12">
            <div class="remove-btn">
                <button type="button" class="btn-dovetail" onclick="removeItem(this)">Remove</button>
            </div>
        </div>
    </div>
</div>
