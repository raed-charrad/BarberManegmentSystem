    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('appointment.store') }}">
                        @csrf
                        <div class="input-group">
                            <div class="container">
                                <div class="form-group">
                                    <label > Service required</label>
                                    <select name="service" id="">
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->title }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('service'))
                                <div class="error">
                                    {{ $errors->first('service') }}
                                </div>
                                @endif
                                <div class="form-group">
                                    <label > Stylist preferred</label>
                                    <select name="stylist" id="">
                                        @foreach($stylists as $stylist)
                                        <option value="{{ $stylist->id }}">{{ $stylist->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('stylist'))
                                <div class="error">
                                    {{ $errors->first('stylist') }}
                                </div>
                                @endif

                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="datetime-local" name="Date" class="form-control {{ $errors->has('date') ? 'error' : '' }}" >
                                </div>
                                @if ($errors->has('Date'))
                                <div class="error">
                                    {{ $errors->first('Date') }}
                                </div>
                                @endif
                                <div class="form-group">
                                    <label>Other details you may wish to highlight</label>
                                    <input type="textarea" name="comment" class="form-control {{ $errors->has('message') ? 'error' : '' }} " >
                                </div>
                                @if ($errors->has('comment'))
                                <div class="error">
                                    {{ $errors->first('comment') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" name="send" value="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
