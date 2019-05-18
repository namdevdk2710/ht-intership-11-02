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
    public class Styles_Users_Search_KeysController : ApiController
    {
        private DatabaseContext db = new DatabaseContext();

        // GET: api/Styles_Users_Search_Keys
        [HttpGet]
        [Route("api/GetStyles_Users_Search_Keys/{idCatalog}")]
        public HttpResponseMessage GetStyles_Users_Search_Keys(int idCatalog)
        {
            try
            {
                if (idCatalog == 0)
                {
                    var list = db.Styles_Users_Search_Keys.Where(e => e.ID_Catalog != 0).OrderBy(o => Guid.NewGuid()).ToList();
                    foreach (Styles_Users_Search_Keys d in list)
                    {
                        d.Image = "Thumb.ashx?s=400&file=/" + d.Image;
                    }
                    var resp = Request.CreateResponse<RegisterResponseModel>(
                        HttpStatusCode.OK,
                        new RegisterResponseModel(){
                            status = true,
                            data = list,
                            error_message = "" }
                        );
                    return resp;
                }
                else
                {
                    var list = db.Styles_Users_Search_Keys.Where(e => e.ID_Catalog == idCatalog).OrderByDescending(o => o.Total).ToList();
                    foreach (Styles_Users_Search_Keys d in list)
                    {
                        d.Image = "Thumb.ashx?s=400&file=/" + d.Image;
                    }
                    var resp = Request.CreateResponse<RegisterResponseModel>(
                        HttpStatusCode.OK,
                        new RegisterResponseModel() {
                            status = true,
                            data = list,
                            error_message = ""}
                    );
                    return resp;
                }
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