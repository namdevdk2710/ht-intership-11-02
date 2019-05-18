using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Data.Entity.Infrastructure;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;
using System.Web.Http.Description;
using MusicAPIStore.Context;
using MusicAPIStore.Filters;
using MusicAPIStore.Models;

namespace MusicAPIStore.Controllers
{
    [APIAuthorizeAttribute]
    public class Styles_Users_FollowController : ApiController
    {
        private DatabaseContext db = new DatabaseContext();

        // GET: api/GetStyles_UserFollow/{iduserfllow}
        [HttpGet]
        [Route("api/GetStyles_UserFollow/{iduserfllow}")]
        public HttpResponseMessage GetStyles_UserFollow(int iduserfllow)
        {
            try
            {
                var ListChildCustom =  from u in db.Styles_Users
                                       join f in db.Styles_Users_Follow on u.ID_User equals f.ID_User_Follow
                                       where f.ID_User_Object == iduserfllow &&
                                        u.IsStore == true &&
                 u.Active == true &&
                 u.Lock == false &&
                 u.ID_Role != 1 &&
                 u.Logo != null && (from p in db.Styles_Shops_Products
                                    where
                                    p.UserName == u.ID_User.ToString() &&
                                    p.Active == true &&
                                    p.IsInTrash == false
                                    select p.Image).ToList().Count > 1
                                       select u;
                var list = ListChildCustom.OrderBy(u => Guid.NewGuid()).ToList();
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel() {
                        status = true,
                        data = list,
                        error_message = ""
                    });
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

       
    }
}