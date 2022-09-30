    <template id="spkEdit">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Edit  Spk</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form  v-show="!loading" enctype="multipart/form-data" @submit="update()" class="form form-default" :action="'spk/edit/' + data.id" method="post">
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
                                        <button @click="update()" :disabled="errors.any()" class="btn btn-primary" type="button">
                                            <i class="load-indicator"><clip-loader :loading="saving" color="#fff" size="14px"></clip-loader> </i>
                                            {{submitbuttontext}}
                                            <i class="fa fa-send"></i>
                                        </button>
                                    </div>
                                </form>
                                <div v-show="loading" class="load-indicator static-center">
                                    <span class="animator">
                                        <clip-loader :loading="loading" color="gray" size="20px">
                                        </clip-loader>
                                    </span>
                                    <h4 style="color:gray" class="loading-text"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </template>
    <script>
	var SpkEditComponent = Vue.component('spkEdit', {
		template : '#spkEdit',
		mixins: [EditPageMixin],
		props: {
			pagename : {
				type : String,
				default : 'spk',
			},
			routename : {
				type : String,
				default : 'spkedit',
			},
			apipath : {
				type : String,
				default : 'spk/edit',
			},
		},
		data: function() {
			return {
				data : { id_surat: '',status: '',id_user: '',catatan: '', },
			}
		},
		computed: {
			pageTitle: function(){
				return 'Edit  Spk';
			},
		},
		methods: {
			actionAfterUpdate : function(response){
				this.$root.$emit('requestCompleted' , this.msgafterupdate);
				if(!this.ismodal){
					this.$router.push('/spk');
				}
			},
		},
		watch: {
			id: function(newVal, oldVal) {
				if(this.id){
					this.load();
				}
			},
			modelBind: function(){
				var binds = this.modelBind;
				for(key in binds){
					this.data[key]= binds[key];
				}
			},
			pageTitle: function(){
				this.SetPageTitle( this.pageTitle );
			},
		},
		created: function(){
			this.SetPageTitle(this.pageTitle);
		},
		mounted: function() {
			//this.load();
		},
	});
	</script>
