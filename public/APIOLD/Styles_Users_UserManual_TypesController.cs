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
    [APIAPPAuthorizeAttribute]
    public class Styles_Users_UserManual_TypesController : ApiController
    {
        private DatabaseContext db = new DatabaseContext();

        // GET: api/Styles_Users_UserManual_Types
        [HttpGet]
        [Route("api/GetStyles_Users_UserManual_Types")]
        public HttpResponseMessage GetStyles_Users_UserManual_Types()
        {
            try
            {
                var list = db.Styles_Users_UserManual_Types.Where(d => d.ID_Parent == 0).ToList();
                var resp = Request.CreateResponse<RegisterResponseModel>(
                HttpStatusCode.OK,
                new RegisterResponseModel()
                {
                    status = true,
                    data = list,
                    error_message = ""
                }
                );
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

        // GET: api/Styles_Users_UserManuals
        [HttpGet]
        [Route("api/GetStyles_Users_UserManuals/{idType}")]
        public HttpResponseMessage GetStyles_Users_UserManuals(int idType)
        {
            try
            {
                var list = db.Styles_Users_UserManuals.Where(e => e.ID_Type == idType).OrderByDescending(o => o.TotalView).ToList();
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
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

        //Detail Styles_Users_UserManuals
        // GET: api/Styles_Users_UserManuals
        [HttpGet]
        [Route("api/GetStyles_Users_UserManuals/Detail/{idUserManual}")]
        public HttpResponseMessage GetStyles_Users_UserManuals_Detail(int idUserManual)
        {
            try
            {
                var list = db.Styles_Users_UserManuals.Where(e => e.ID_UserManual == idUserManual).ToList();
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
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