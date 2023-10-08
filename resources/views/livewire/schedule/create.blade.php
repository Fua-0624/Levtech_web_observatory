<div>
    <x-adminlte-modal id="createScheduleModal" title="予定登録" theme="info"
                      v-centered
                      scrollable wire:ignore.self>
        <div class="row">
            <div class="col-12" style="height:500px">
                <div class="row">
                    <x-adminlte-select name="schedule.observatory_id" label="天文台" fgroup-class="col-12"
                                       wire:model.defer="schedule.user_id">
                        @foreach($observatories as $observatory)
                            <option value="{{ $observatory->id }}">{{ $observatory->name }}</option>
                        @endforeach
                    </x-adminlte-select>
                </div>
                <div class="row">
                    <x-adminlte-input name="schedule.title" fgroup-class="col-12" label="タイトル"
                                      wire:model.defer="schedule.title"/>
                </div>
                <div class="row">
                    <x-adminlte-input name="schedule.day" fgroup-class="col-12" class="flatpickrDay" label="日付"
                                      wire:model.lazy="schedule.day"/>
                </div>
                <div class="row">
                    <x-adminlte-input name="schedule.start" label="開始時間" fgroup-class="col-6"
                                      class="flatpickrStartTime" wire:model.defer="schedule.start" />

                    <x-adminlte-input name="schedule.end" label="終了時間" fgroup-class="col-6"
                                      class="flatpickrEndTime" wire:model.defer="schedule.end"/>
                </div>
            </div>

        </div>

        <x-slot name="footerSlot">
            <x-adminlte-button label="閉じる" class="secondary" data-dismiss="modal"/>
            <x-adminlte-button label="登録" theme="primary" wire:click="create()" />

        </x-slot>
    </x-adminlte-modal>

    <button type="button" class="btn btn-success" data-toggle="modal" wire:click="openModal">予定登録
    </button>


    @push('js')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                Livewire.hook('message.processed', (message, component) => {
                    flatpickr('.flatpickrDay',{
                        locale: 'ja',
                    });
                    flatpickr('.flatpickrStartTime', {
                        locale: 'ja',
                        enableTime: true,   // 時間の選択可否
                        noCalendar: true,   // カレンダー非表示
                        dateFormat: "H:i",  // 表示フォーマット
                        time_24hr: true,    // 24時間表記
                        //セレクターを閉じた時に発動する処理
                        onClose: function(selectedDates, dateStr, instance){
                            @this.setScheduleStart(dateStr);
                        }
                    });
                    flatpickr('.flatpickrEndTime', {
                        locale: 'ja',
                        enableTime: true,   // 時間の選択可否
                        noCalendar: true,   // カレンダー非表示
                        dateFormat: "H:i",  // 表示フォーマット
                        time_24hr: true,    // 24時間表記
                        minDate: @this.schedule.start // 開始時間より前にセットできないように
                    });
                })
            });
        </script>

        <script>
            //モーダル展開用
            window.addEventListener('showCreateScheduleModal', event => {
                $('#createScheduleModal').modal('show');
            });
            window.addEventListener('closeCreateScheduleModal', event => {
                $('#createScheduleModal').modal('hide');
            });
        </script>
    @endpush

</div>
