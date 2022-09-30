    <template id="spkAdd">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Add New Spk</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form enctype="multipart/form-data" @submit="save" class="form form-default" action="spk/add" method="post">
                                    <div class="form-group " :class="{'has-error' : errors.has('id_surat')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="id_surat">Id Surat <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.id_surat"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Id Surat"
                                                    class="form-control "
                                                    type="text"
                                                    name="id_surat"
                                                    placeholder="Enter Id Surat"
                                                    />
                                                    <small v-show="errors.has('id_surat')" class="form-text text-danger">
                                                        {{ errors.first('id_surat') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('status')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="status">Status <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.status"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Status"
                                                    class="form-control "
                                                    type="text"
                                                    name="status"
                                                    placeholder="Enter Status"
                                                    />
                                                    <small v-show="errors.has('status')" class="form-text text-danger">
                                                        {{ errors.first('status') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('id_user')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="id_user">Id User <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.id_user"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Id User"
                                                    class="form-control "
                                                    type="text"
                                                    name="id_user"
                                                    placeholder="Enter Id User"
                                                    />
                                                    <small v-show="errors.has('id_user')" class="form-text text-danger">
                                                        {{ errors.first('id_user') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('catatan')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="catatan">Catatan <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.catatan"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Catatan"
                                                    class="form-control "
                                                    type="text"
                                                    name="catatan"
                                                    placeholder="Enter Catatan"
                                                    />
                                                    <small v-show="errors.has('catatan')" class="form-text text-danger">
                                                        {{ errors.first('catatan') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary"  :disabled="errors.any()" type="submit">
                                            <i class="load-indicator">
                                                <clip-loader :loading="saving" color="#fff" size="15px"></clip-loader>
                                            </i>
                                            {{submitbuttontext}}
                                            <i class="fa fa-send"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </template>
    <script>
	var SpkAddComponent = Vue.component('spkAdd', {
		template : '#spkAdd',
		mixins: [AddPageMixin],
		props:{
			pagename : {
				type : String,
				default : 'spk',
			},
			routename : {
				type : String,
				default : 'spkadd',
			},
			apipath : {
				type : String,
				default : 'spk/add',
			},
		},
		data : function() {
			return {
				id : {
					type : String,
					default : '',
				},
				data : {
					id_surat: '',status: '',id_user: '',catatan: '',
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'Add New Spk';
			},
		},
		methods: {
			actionAfterSave : function(response){
				this.$root.$emit('requestCompleted' , this.msgaftersave);
				this.$router.push('/spk');
			},
			resetForm : function(){
				this.data = {id_surat: '',status: '',id_user: '',catatan: '',};
				this.$validator.reset();
			},
		},
		mounted : function() {
		},
	});
	</script>
