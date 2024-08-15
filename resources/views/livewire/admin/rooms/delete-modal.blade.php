<div wire:ignore.self class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-content p-2">
                            <h4 class="modal-title">حذف</h4>
                            <p class="mb-4">هل انت متأكد من حذف هذا العنصر ؟</p>
                            <div class="row text-center">
                                <div class="col-sm-3">
                                </div>
                                <div class="col-sm-2">
                                    <form>
                                        <button type="submit" class="btn btn-danger" wire:click.prevent="delete()" data-dismiss="modal">حذف </button>
                                    </form>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">إلغاء</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>