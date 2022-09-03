<template>
    <div class="row mb-3">
        <label class="col-md-3 col-form-label text-md-end">Vehicle categories</label>

        <div class="col-md-9">
            <table class="table table-bordered" id="category-table">
                <thead class="text">
                <tr>
                    <th>Category</th>
                    <th>Extra</th>
                    <th>Action
                        <a class="btn btn-sm btn-primary pull-right" @click="addRow">
                            Attach new category
                            <i class="fa fa-plus"></i>
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for='(vehicleCategory, index) in this.vehicleCategories'>
                    <td>
                        <select class="form-select vehicle-category" v-on:change="removeCategoryFromNotChosenCategories">
                            <option selected disabled>Select Category</option>
                            <option v-for='category in notChosenCategories' :value="category.id">{{ category.name }}</option>
                        </select>
                    </td>
                    <td>
                        <input v-model="vehicleCategory.id" class="vehicle-category-id" type="hidden">
                        <input v-model="vehicleCategory.name" class="form-control vehicle-category-extra" type="text">
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-danger" @click="deleteRow(index)"><i class="fa fa-remove"></i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['categories', 'existingVehicleCategories'],

        data() {
            return {
                vehicleCategories: this.existingVehicleCategories,
                notChosenCategories: this.categories
            };
        },

        methods: {
            addRow: function() {
                this.vehicleCategories.push({name:'', email:''})
            },
            deleteRow(index){
                this.vehicleCategories.splice(index,1);
            },
            // switchSelect(event) {
            //     console.log(event)
            // },
            removeCategoryFromNotChosenCategories: function(e) {
                // this.notChosenCategories.splice(e.target.value, 1);
                // console.log(e.target.value);
            },
        },
        mounted() {
            console.log(this.existingVehicleCategories);
            console.log(this.vehicleCategories);
        }
    }
</script>
