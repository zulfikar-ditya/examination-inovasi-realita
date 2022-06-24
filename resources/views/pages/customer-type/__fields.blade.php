<x-form  :action="$model ? route('customer-type.update', $model) : route('customer-type.store')" :method="$model ? 'update' : 'create'">
    <div class="row">

        <div class="col-md-6">
            <x-input :type="'text'" :name="'name'" :value="$model ? $model->name : ''" :required="true" :autofocus="true"/>
        </div>

    </div>
</x-form>