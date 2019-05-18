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
using MusicAPIStore.Models;

namespace MusicAPIStore.Controllers
{
    public class Styles_Banners_Slides_TranslationController : ApiController
    {
        private DatabaseContext db = new DatabaseContext();

        // GET: api/Styles_Banners_Slides_Translation
        public IQueryable<Styles_Banners_Slides_Translation> GetStyles_Banners_Slides_Translation()
        {
            return db.Styles_Banners_Slides_Translation;
        }

        // GET: api/Styles_Banners_Slides_Translation/5
        [ResponseType(typeof(Styles_Banners_Slides_Translation))]
        public IHttpActionResult GetStyles_Banners_Slides_Translation(int id)
        {
            Styles_Banners_Slides_Translation styles_Banners_Slides_Translation = db.Styles_Banners_Slides_Translation.Find(id);
            if (styles_Banners_Slides_Translation == null)
            {
                return NotFound();
            }

            return Ok(styles_Banners_Slides_Translation);
        }

        // PUT: api/Styles_Banners_Slides_Translation/5
        [ResponseType(typeof(void))]
        public IHttpActionResult PutStyles_Banners_Slides_Translation(int id, Styles_Banners_Slides_Translation styles_Banners_Slides_Translation)
        {
            if (!ModelState.IsValid)
            {
                return BadRequest(ModelState);
            }

            if (id != styles_Banners_Slides_Translation.ID)
            {
                return BadRequest();
            }

            db.Entry(styles_Banners_Slides_Translation).State = EntityState.Modified;

            try
            {
                db.SaveChanges();
            }
            catch (DbUpdateConcurrencyException)
            {
                if (!Styles_Banners_Slides_TranslationExists(id))
                {
                    return NotFound();
                }
                else
                {
                    throw;
                }
            }

            return StatusCode(HttpStatusCode.NoContent);
        }

        // POST: api/Styles_Banners_Slides_Translation
        [ResponseType(typeof(Styles_Banners_Slides_Translation))]
        public IHttpActionResult PostStyles_Banners_Slides_Translation(Styles_Banners_Slides_Translation styles_Banners_Slides_Translation)
        {
            if (!ModelState.IsValid)
            {
                return BadRequest(ModelState);
            }

            db.Styles_Banners_Slides_Translation.Add(styles_Banners_Slides_Translation);
            db.SaveChanges();

            return CreatedAtRoute("DefaultApi", new { id = styles_Banners_Slides_Translation.ID }, styles_Banners_Slides_Translation);
        }

        // DELETE: api/Styles_Banners_Slides_Translation/5
        [ResponseType(typeof(Styles_Banners_Slides_Translation))]
        public IHttpActionResult DeleteStyles_Banners_Slides_Translation(int id)
        {
            Styles_Banners_Slides_Translation styles_Banners_Slides_Translation = db.Styles_Banners_Slides_Translation.Find(id);
            if (styles_Banners_Slides_Translation == null)
            {
                return NotFound();
            }

            db.Styles_Banners_Slides_Translation.Remove(styles_Banners_Slides_Translation);
            db.SaveChanges();

            return Ok(styles_Banners_Slides_Translation);
        }

        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }

        private bool Styles_Banners_Slides_TranslationExists(int id)
        {
            return db.Styles_Banners_Slides_Translation.Count(e => e.ID == id) > 0;
        }
    }
}