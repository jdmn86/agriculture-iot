<template>
	<!-- <MainContainerAdmin > -->
		<div>
		<Loading :loading.sync="loading" ></Loading>

		<HeadContainer :title="title">

					<template slot="search" >



					</template>
		</HeadContainer>

		<BodyContainer  :title="title" >

					<template slot="body" >

						<b-col cols="auto" style="margin: 5px">
							<b-row align-v="center" align-h="start">
										<b-col  cols="auto" class=" text-right">
													<h5>Role :</h5>
										</b-col>

										<b-col v-if="roles " cols="auto" class=" text-left" style="margin: 5px">

												<b-form-select v-if="roles"

												v-model="roleSel"

												size="sm"
												>
														<option :key="f.id" v-for="f in roles" :selected="roleSel.id == f.id "  v-bind:value="f">{{ f.name }}</option>
												</b-form-select>

										</b-col>
								</b-row>

								<b-row align-v="center" align-h="start">

									<b-col cols="auto" class=" text-left  " style="margin: 5px">

										<div class="card" >
											<div class="card-header">
													<strong>premissions of role selected</strong>
											</div>
												<b-list-group v-if="roleSel" >
													<b-list-group-item v-for="r in auxRolePermissions" :key="r.id" @click="removeFromRole(r)">{{ r.name }}</b-list-group-item>
											
												</b-list-group>
													<!-- <b-form-select v-if="roles"
	
													v-model="role"
													@input="removeFromRole"
													size="sm"
													>
															<option :key="f.id" v-for="f in role.permissions" :selected="role.id == f.id "  v-bind:value="f">{{ f.name }}</option>
													</b-form-select> -->
												 <!-- </div> -->
										</div>
										</b-col>
								
									<b-col cols="auto" class=" text-left" style="margin: 5px">
										<div class="card " >
											<div class="card-header">
													<strong>premissions disponiveis para adicionar </strong>
											</div>
										
											<b-list-group v-if="auxPermissionsWithoutThisRole" >
												<b-list-group-item v-for="p in auxPermissionsWithoutThisRole" :key="p.id" @click="sendToRole(p)">{{ p.name }}</b-list-group-item>
										
											</b-list-group>
											
											<!-- <b-form-select v-if="permissions"

											v-model="role"
											@input="goToRole"
											size="sm"
											>
													<option :key="f.id" v-for="f in roles" :selected="role.id == f.id "  v-bind:value="f">{{ f.name }}</option>
											</b-form-select> -->
										<!-- </div> -->
									</div>
								</b-col>

								</b-row>
						</b-col>

					</template>

		</BodyContainer>
</div>
<!-- </MainContainerAdmin> -->

</template>

<script>
import HeadContainer from "../../../wrapper/HeadContainer";
// import MainContainerAdmin from "../../../wrapper/MainContainerAdmin";
import BodyContainer from "../../../wrapper/BodyContainer"

import {PermissionService} from "../../../services/PermissionService";
import {RoleService} from "../../../services/RoleService";

import {mapGetters,mapActions} from 'vuex'

import Loading from "../../../components/Loading";

export default {
name: "PermissionRole",
data() {
return {
		title: "Farms",
		loading: false,
	auxRolePermissions: null,
	auxPermissionsWithoutThisRole: null,
};
},
components: {
// MainContainerAdmin,
HeadContainer,
BodyContainer,
Loading,
},
computed : {
			...mapGetters('role',['roles','roleById','roleSelected']),
			...mapGetters('permission',['permissions','permissionById','permissionSelected']),
			roleSel: {
                get () {
                  return this.roleSelected;
                },
                set (value) {
                      if(value){
                        console.log("set value :" + JSON.stringify(value));
												this.setRoleSelected(value);
												console.log("roleSelected :" + JSON.stringify(this.roleSelected));

																															// this.plagues.filter(p => p.zona.find(z => z.id == this.zona.id));
												this.auxPermissionsWithoutThisRole = this.permissions.filter(f => f.id.find(z => z.id != this.roleSelected.permissions.id ));
												// this.auxPermissionsWithoutThisRole = this.permissions.filter(f => !this.roleSelected.permissions.includes(f));
												console.log("auxPermissionsWithoutThisRole :" + JSON.stringify(this.auxPermissionsWithoutThisRole));
												this.auxRolePermissions = this.roleSelected.permissions;
												console.log("auxRolePermissions :" + JSON.stringify(this.auxRolePermissions));
                        // if(this.$route.params && this.$route.params.farmId != value.id ){
                        //       this.$router.push({name:'farmShow', params: { farmId: value.id } });
                        // }
                      }
                }
              }
},
created() {

},
methods: {
	...mapActions('role',['setRoles','setRoleSelected']),
	...mapActions('permission',['setPermissions','setPermissionsSelected']),
		sendToRole(value){
			console.log("sendToRole : "+ JSON.stringify(value));
			
			
		},
		removeFromRole(value){
			console.log("removeFromRole : "+ JSON.stringify(value));

		},
		async fetchData () {

		this.loading = true		

		try {
				const { data } = await RoleService.getList();//this.fetchParams)
				this.setRoles(data);
				this.setRoleSelected();
				//copiar para array que se possa alterar
				// this.auxRolePermissions = this.roleSelected.permissions;
				


		} catch (e) {
				// this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
				this.error = e.message
				console.log(e)
		} finally {
				// this.loading = false
		}

	

}
},
async	mounted () {

	 this.fetchData().then(async() => {
	console.log("---------Mounted---------");
		try {
					const { data } = await PermissionService.getList();//this.fetchParams)
					this.setPermissions(data);
					//copiar para array que se possa alterar
					//this.auxPermissionsWithoutThisRole = this.permissions.filter(f => this.auxRolePermissions.includes(f));
					// elmts = ar1.filter(f => !ar2.includes(f));

					

			} catch (e) {
					// this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
					this.error = e.message
					console.log(e)
			} finally {
					this.loading = false
			}

	});

	console.log("Mounted Farm.vue");

	},
};
</script>

<style scoped>

.card {
    height: 40vh;
}
.card .list-group {
    overflow-y: auto;
}
</style>
