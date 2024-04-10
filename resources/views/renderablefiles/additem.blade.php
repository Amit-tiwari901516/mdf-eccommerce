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
                    <label class="input-group-text font-weight-bold" for="inputGroupSelect02">Product</label>
                </div>
                <select name="product[]" class="custom-select product_select" id="inputGroupSelect02"
                    onchange="getSelectedProduct(this)" required="required">
                    <option selected="" disabled>Select</option>

                    @forelse ($products as $product)
                        <option value="{{ $product->id }}">
                            @if (custom()->online_sequence_code == 1)
                                (&nbsp;{{ $product->code }}&nbsp;)
                            @endif
                            {{ $product->name }}
                        </option>
                    @empty
                        <option disabled>No Products</option>
                    @endforelse

                </select>
            </div>
        </div>
        <!-- end: Product Select -->


        <div class="col-12 col-md-2 col-sm-6 showProductImageDiv">

        </div>
        {{-- end: Show Selected Product Button --}}


        <div class="col-12 col-md-2 col-sm-6 h-100 heightDiv" id="heightDiv{{ $id }}">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bold" id="idwidth">H
                        ({{ session()->get('unit') }})</span>
                </div>
                <input name="height[]" type="number" value="0" min="0" class="form-control hwd-inp"
                    step=".01" required>
                <div id="extraHeightOption" class="width_frac" {{ session()->get('unit') == 'mm' ? 'hidden' : '' }}>
                    <select name="height_in[]" class="custom-select" id="__heightIn">
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

        <div class="col-12 col-md-2 col-sm-6 h-100 widthDiv">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bold" id="idwidth">W
                        ({{ session()->get('unit') }})</span>
                </div>
                <input name="width[]" type="number" value="0" min="0" class="form-control hwd-inp"
                    step=".01" required>
                <div id="extraWidthOption" class="width_frac" {{ session()->get('unit') == 'mm' ? 'hidden' : '' }}>
                    <select name="width_in[]" class="custom-select" id="__widthIn">
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

        <div class="col-12 col-md-2 col-sm-6 h-100 depthDiv">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bold" id="idwidth">D
                        ({{ session()->get('unit') }})</span>
                </div>
                <input name="depth[]" type="number" value="0" min="0" class="form-control hwd-inp"
                    step=".01">
                <div id="extraDepthOption" class="width_frac" {{ session()->get('unit') == 'mm' ? 'hidden' : '' }}>
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
                <input name="quantity[]" type="number" step="1" value="1" class="form-control"
                    min="1">
            </div>
        </div>
        <!-- end: Qty -->

        <div class="col-12 col-md-8 col-sm-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text items_notes_text">Notes <br> (Optional)</span>
                    <code class="alertText"></code>
                </div>
                <textarea name="note[]" class="form-control note" rows="4" aria-label="With textarea" spellcheck="false"></textarea>
            </div>
        </div>
        <!-- end: Notes -->
        {{-- Note: This Code doesnt work properly --}}
        <div class="col-6 col-md-6 col-sm-12 designDiv">
            <div class="upload_design">
                <input type="file" id="actual-btn-2" name="design[]" class="design" />

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
