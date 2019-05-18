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
using StyleSoftware;

namespace MusicAPIStore.Controllers
{
    [APIAPPAuthorizeAttribute]
    public class Styles_Users_LocationsController : ApiController
    {
        private DatabaseContext db = new DatabaseContext();

        [HttpGet]
        [Route("api/GetStyles_Users_Locations/{idLocation}/{top}")]
        public HttpResponseMessage GetStyles_Users_Locations(int idLocation, int top)
        {
            try
            {
                var list = db.Styles_Users_Locations.Where(e => e.LocationParent == idLocation & e.Active == true).Take(top).ToList();
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

        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }

        public class ModelSearchLocationHint
        {
            public string Title { get; set; }
            public int ID_Location { get; set; }
            public string LocationName { get; set; }
            public string Link_SEO { get; set; }
        }

        //Gợi ý tìm kiếm địa điểm
        [HttpGet]
        [Route("api/GetSearchLocationHint/{prefix}/{lang}")]
        public HttpResponseMessage GetSearchLocationHint(string prefix, string lang)
        {
            try
            {
                prefix = TiengViet.RemoveUnicode(TiengViet.BoDauKhongVietHoa(prefix), true).Replace("-", " ");
                if (lang == "vi")
                {
                    var list = db.Database.SqlQuery<ModelSearchLocationHint>("Select top(7) LocationName,ID_Location,Link_SEO,(Select 'dia-diem') as Title from Styles_Users_Locations_Translation " +
            " where LocationName like N'%" + prefix + "%'").ToList();
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
                else
                {
                    var list = db.Database.SqlQuery<ModelSearchLocationHint>("Select top(7) LocationName,ID_Location,Link_SEO,(Select 'location') as Title from Styles_Users_Locations_Translation " +
              " where LocationName like N'%" + prefix + "%'").ToList();
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