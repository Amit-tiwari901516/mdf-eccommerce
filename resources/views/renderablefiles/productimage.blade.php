<div class="input-group selected-product-show">
    <span class="productName"> {{ $product->name }}</span>&nbsp;
    <span data-bs-toggle="modal" data-bs-target="#productImage_{{ $product->id }}"> (Show)
    </span>
</div>

<!-- Back Notch Modal -->
<div class="modal fade backnotch_modal" id="productImage_{{ $product->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset($product->image) }}" alt="" style="max-width: 30%;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
